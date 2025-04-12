<?php
/* Template Name: Template-con-sidebar */
get_header();
?>

<!-- Section: Eventi -->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5">

            <!-- Contenuto principale -->
            <div class="col-12 col-md-8">
                <div class="row"> <!-- Riga interna per le cards -->

                    <?php
                    $args = array(
                        'post_type' => 'eventi',
                        'posts_per_page' => -1
                    );
                    $query = new WP_Query($args);
                    ?>

                    <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                            <div class="col-12 col-md-6 col-lg-4 mb-5">
                                <div class="card h-100 d-flex flex-column">
                                    <!-- Immagine -->
                                    <?php if (has_post_thumbnail()) : ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <img class="card-img-top" src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" style="height: 250px; object-fit: cover;" />
                                        </a>
                                    <?php else : ?>
                                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="No image" style="height: 250px; object-fit: cover;" />
                                    <?php endif; ?>

                                    <div class="card-body p-4 d-flex flex-column justify-content-between">
                                        <div class="text-center">
                                            <h5 class="fw-bolder">
                                                <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark"><?php the_title(); ?></a>
                                            </h5>
                                            <p class="text-muted small">
                                                Data:
                                                <?php
                                                $data_evento = get_field('data_evento');
                                                echo $data_evento ? date('d F Y', strtotime($data_evento)) : 'Data non disponibile';
                                                ?>
                                            </p>

                                            <!-- Tipologia -->
                                            <?php
                                            $tipologie = get_the_terms(get_the_ID(), 'tipologia');
                                            if ($tipologie && !is_wp_error($tipologie)) :
                                                foreach ($tipologie as $tipologia) :
                                                    $tipologia_link = get_term_link($tipologia);
                                                    echo '<p class="text-muted small">Tipologia: <a href="' . esc_url($tipologia_link) . '" class="text-decoration-none">' . esc_html($tipologia->name) . '</a></p>';
                                                endforeach;
                                            endif;
                                            ?>

                                            <!-- Recensioni -->
                                            <?php
                                            $recensioni = get_the_terms(get_the_ID(), 'recensioni');
                                            if ($recensioni && !is_wp_error($recensioni)) :
                                                foreach ($recensioni as $recensione) :
                                                    $recensione_link = get_term_link($recensione);
                                                    echo '<p class="text-muted small">Recensione: <a href="' . esc_url($recensione_link) . '" class="text-decoration-none">' . esc_html($recensione->name) . '</a></p>';
                                                endforeach;
                                            endif;
                                            ?>

                                            <!-- Stelle -->
                                            <?php
                                            $stelle = get_field('stelle');
                                            if ($stelle) :
                                                echo '<p class="text-muted small">Stelle: ';
                                                for ($i = 1; $i <= 5; $i++) {
                                                    $star_class = ($i <= $stelle) ? 'fas fa-star' : 'far fa-star';
                                                    echo '<a href="#" class="star-link" data-rating="' . $i . '"><i class="' . $star_class . '"></i></a>';
                                                }
                                                echo '</p>';
                                            endif;
                                            ?>
                                        </div>
                                    </div>

                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center">
                                            <a class="btn btn-outline-dark mt-auto" href="<?php the_permalink(); ?>">Scopri di più</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                    else : ?>
                        <p class="text-muted">Nessun evento trovato.</p>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>

                </div> <!-- Fine riga interna cards -->
            </div> <!-- Fine col-8 -->

            <!-- Sidebar -->
            <div class="col-12 col-md-4 mt-5 mt-md-0 ms-md-auto">
                <div class="p-4 border rounded shadow-sm bg-light h-100">
                    <?php get_sidebar(); ?> <!-- Carica il file sidebar.php -->
                    <?php dynamic_sidebar('Sidebar 2'); // Inserisci la sidebar personalizzata 1 -->?>
                </div>
            </div> <!-- Fine sidebar -->


        </div> <!-- Fine row -->
    </div> <!-- Fine container -->
</section>

<?php get_footer(); ?>