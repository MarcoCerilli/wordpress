<?php get_header(); ?>

<!-- Header -->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Eventi Windsurf</h1>
            <p class="lead fw-normal text-white-50 mb-0">Scopri tutti gli eventi di Windsurf!</p>
        </div>
    </div>
</header>

<!-- Section: Eventi -->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            
            <?php 
            // Parametri della query per gli eventi "windsurf"
            $pagina_attuale = get_query_var('paged') ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'eventi',  // Custom post type "Eventi"
                'paged' => $pagina_attuale,
                'posts_per_page' => 7,
                'meta_key' => 'data_evento', // Ordina per data_evento se necessario
            );

            // Se siamo su una pagina di tassonomia, aggiungi il filtro per "tipologia"
            if (is_tax('tipologia')) {
                $term = get_queried_object();
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'tipologia',
                        'field'    => 'slug',
                        'terms'    => $term->slug,
                    ),
                );
            }

            $eventi = new WP_Query($args);

            if ($eventi->have_posts()) :
                while ($eventi->have_posts()) : $eventi->the_post();
            ?>
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
            <?php else : ?>
                <p class="text-muted">Nessun evento trovato.</p>
            <?php endif; ?>
        </div>

        <!-- Paginazione -->
        <div class="pagination text-center">
            <?php echo paginate_links(array('total' => $eventi->max_num_pages)); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
