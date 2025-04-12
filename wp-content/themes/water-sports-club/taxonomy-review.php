<?php get_header(); ?>

<!-- Header -->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Recensioni: <?php single_term_title(); ?></h1>
            <p class="lead fw-normal text-white-50 mb-0">Scopri gli eventi con la recensione <?php single_term_title(); ?>!</p>
        </div>
    </div>
</header>

<!-- Section: Eventi -->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">

            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="col-12 col-md-6 col-lg-4 mb-5">
                        <div class="card h-100 d-flex flex-column">
                            <!-- Immagine in evidenza -->
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <img class="card-img-top" src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" />
                                </a>
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
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <p class="text-muted">Nessun evento trovato per questa recensione.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
