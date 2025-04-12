<?php get_header(); ?>

<!-- Header -->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Eventi Windsurf</h1>
            <p class="lead fw-normal text-white-50 mb-0">Scopri tutti gli eventi di Windsurf nella categoria: <?php single_term_title(); ?>!</p>
        </div>
    </div>
</header>

<!-- Section: Eventi -->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">

            <?php
            // Imposta la query personalizzata per gli eventi della tassonomia "tipologia"
            $term = get_queried_object(); // Recupera l'oggetto della tassonomia corrente (es. "tipologia")
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // Gestisci la paginazione

            $args = array(
                'post_type' => 'eventi',  // Custom post type "Eventi"
                'tax_query' => array(
                    array(
                        'taxonomy' => 'tipologia',
                        'field'    => 'slug',
                        'terms'    => $term->slug, // Filtra gli eventi per la tassonomia "tipologia" corrente
                    ),
                ),
                'posts_per_page' => 6,  // Numero di eventi per pagina
                'paged' => $paged,  // Gestisce la paginazione
                'meta_key' => 'data_evento', // Ordina per la data dell'evento
                'orderby' => 'meta_value',
                'order' => 'ASC',  // Ordina per data crescente
            );

            $eventi_query = new WP_Query($args); // Esegui la query

            // Verifica se ci sono eventi
            if ($eventi_query->have_posts()) :
                while ($eventi_query->have_posts()) : $eventi_query->the_post(); ?>

                    <div class="col-12 col-md-6 col-lg-4 mb-5">
                        <div class="card h-100 d-flex flex-column">
                            <!-- Immagine in evidenza -->
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <img class="card-img-top" src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" style="height: 250px; object-fit: cover;" />
                                </a>
                            <?php else : ?>
                                <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="No image" style="height: 250px; object-fit: cover;" />
                            <?php endif; ?>

                            <!-- Corpo della card -->
                            <div class="card-body p-4 d-flex flex-column justify-content-between">
                                <div class="text-center">
                                    <h5 class="fw-bolder">
                                        <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark"><?php the_title(); ?></a>
                                    </h5>
                                    <p class="text-muted small">Data: <?php
                                                                        $data_evento = get_field('data_evento');
                                                                        if ($data_evento) {
                                                                            $data_evento_format = date('d F Y', strtotime($data_evento));
                                                                            echo $data_evento_format;
                                                                        } else {
                                                                            echo 'Data non disponibile';
                                                                        }
                                                                        ?></p>

                                    <!-- Recupero della "tipologia" -->
                                    <?php
                                    $tipologie = get_the_terms(get_the_ID(), 'tipologia');
                                    if ($tipologie && !is_wp_error($tipologie)) :
                                        foreach ($tipologie as $tipologia) :
                                            $tipologia_link = get_term_link($tipologia);
                                            echo '<p class="text-muted small">Tipologia: <a href="' . esc_url($tipologia_link) . '" class="text-decoration-none">' . esc_html($tipologia->name) . '</a></p>';
                                        endforeach;
                                    endif;
                                    ?>

                                    <!-- Recupero delle "Recensioni" -->
                                    <?php
                                    $recensioni = get_the_terms(get_the_ID(), 'recensioni');
                                    if ($recensioni && !is_wp_error($recensioni)) :
                                        foreach ($recensioni as $recensione) :
                                            $recensione_link = get_term_link($recensione);
                                            echo '<p class="text-muted small">Recensione: <a href="' . esc_url($recensione_link) . '" class="text-decoration-none">' . esc_html($recensione->name) . '</a></p>';
                                        endforeach;
                                    endif;
                                    ?>

                                    <!-- Stelle cliccabili -->
                                    <?php
                                    $stelle = get_field('stelle');
                                    if ($stelle) :
                                        echo '<p class="text-muted small">Stelle: ';
                                        for ($i = 1; $i <= 5; $i++) {  // 5 stelle
                                            $star_class = ($i <= $stelle) ? 'fas fa-star' : 'far fa-star'; // Verifica se la stella deve essere piena o vuota
                                            echo '<a href="#" class="star-link" data-rating="' . $i . '"><i class="' . $star_class . '"></i></a>';
                                        }
                                        echo '</p>';
                                    endif;
                                    ?>
                                </div>
                            </div>

                            <!-- Footer della card -->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto" href="<?php the_permalink(); ?>">Scopri di più</a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>

                <!-- Paginazione -->
                <div class="pagination text-center">
                    <?php
                    echo paginate_links(array(
                        'total' => $eventi_query->max_num_pages, // Numero totale di pagine
                        'current' => $paged,  // Pagina corrente
                    ));
                    ?>
                </div>

            <?php else : ?>
                <p class="text-muted">Nessun evento trovato.</p>
            <?php endif; ?>

        </div>
    </div>
</section>

<?php get_footer(); ?>