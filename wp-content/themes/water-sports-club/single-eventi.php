<?php

/**
 * Template for displaying single eventi posts
 * @subpackage Water Sports Club
 * @since 1.0
 * @version 0.1
 */

get_header(); ?>

<div class="container">
    <div class="content-area">
        <main id="skip-content" class="site-main" role="main">
            <?php
            // Layout e contenuto dell'evento
            $water_sports_club_layout_option = get_theme_mod('water_sports_club_theme_options', 'Right Sidebar');
            if ($water_sports_club_layout_option == 'Left Sidebar' || true) { ?>
                <div class="row">
                    <div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-1'); ?></div>
                    <div class="content_area col-lg-8 col-md-8">
                        <section id="event_section">
                            <?php
                            while (have_posts()) : the_post();
                                // Aggiungiamo la foto dell'evento (immagine in evidenza)
                                if (has_post_thumbnail()) {
                                    echo '<div class="event-thumbnail">';
                                    the_post_thumbnail('medium'); // Mostra l'immagine in grande
                                    echo '</div>';
                                }

                                if (is_singular('eventi')) {

                                    the_title('<h1>', '</h1>');
                                }
                                // Recupero e visualizzazione della data evento (campo ACF)
                                $data_evento = get_field('data_evento');
                                if ($data_evento) {
                                    $parsed = DateTime::createFromFormat('Ymd', $data_evento);
                                    if ($parsed && $parsed->format('Ymd') === $data_evento) {
                                        echo '<p class="text-muted small">📅 Data: ' . $parsed->format('d M Y') . '</p>';
                                    } else {
                                        echo '<p class="text-muted small">⚠️ Formato data non valido: ' . esc_html($data_evento) . '</p>';
                                    }
                                } else {
                                    echo '<p class="text-muted small">📅 Nessuna data disponibile</p>';
                                }

                                // Contenuto principale dell'evento
                                the_content();

                                // Recupero e visualizzazione del campo ACF "stelle"
                                $stelle = get_field('stelle');
                                if ($stelle) {
                                    echo '<p><strong>⭐ Stelle: </strong>' . esc_html($stelle) . '</p>';
                                } else {
                                    echo '<p><strong>⭐ Nessuna valutazione</strong></p>';
                                }

                                // Recupero e visualizzazione del campo ACF "recensioni"
                                $recensioni = get_field('recensioni');
                                if ($recensioni) {
                                    echo '<p><strong>📝 Recensioni: </strong>' . esc_html($recensioni) . '</p>';
                                } else {
                                    echo '<p><strong>📝 Nessuna recensione</strong></p>';
                                }

                                // Commenti
                                if (comments_open() || get_comments_number()) :
                                    comments_template();
                                else :
                                    echo '<p>📝 Nessun commento ancora. Sii il primo a commentare!</p>';
                                endif;
                            endwhile;
                            ?>
                        </section>
                    </div>
                    <div class="clearfix"></div>
                </div>
            <?php } ?>
        </main>
    </div>
</div>

<?php get_footer(); ?>