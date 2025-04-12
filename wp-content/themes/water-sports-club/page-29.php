<?php

/**
 * Template per la visualizzazione delle pagine, pagina Team
 *
 * Questo template mostra le pagine e include una sezione con gli ultimi articoli di una specifica categoria.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package windsurf
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php while (have_posts()) : the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <div class="page-content">
            <?php the_content(); ?>
        </div>

        <?php
        // Se i commenti sono aperti o ci sono già commenti, mostra il template dei commenti
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;
        ?>
    <?php endwhile; ?>
</main><!-- #main -->

<div class="ultimi-articoli">
    <h2>Ultimi Articoli</h2>

    <?php
    //Query personalizzata per gli ultimi 2 articoli della categoria 15
    $args = array(
        'cat' => 15,
        'posts_per_page' => 2
    );

    $query = new WP_Query($args); ?>


    <?php
    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>

            <?php get_template_part('/templates-parts/content', 'team') ?>

        <?php endwhile; ?>
        <?php wp_reset_postdata(); // Reset della query 
        ?>
    <?php else : ?>
        <p>Nessun articolo disponibile.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>