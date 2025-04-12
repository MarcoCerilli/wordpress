<?php

/**
 * Archive template for Custom Post Type: Rider
 * Template Name: Archive Rider
 */

get_header(); ?>

<div class="container">
  <?php if (have_posts()) : ?>
    <header class="page-header">
      <h2 class="page-title"><?php post_type_archive_title(); ?></h2>
      <div class="taxonomy-description">I nostri windsurfisti</div>
    </header>

    <div class="row"> <!-- Supponendo che il CSS gestisca il layout con Flex o Grid -->
      <?php while (have_posts()) : the_post(); ?>
        <div class="column">
          <div class="card">
            <div class="container">
              <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('medium'); ?>
              <?php endif; ?>

              <h3><?php the_title(); ?></h3>
              <p>Età: <?php the_field('eta'); ?></p>
              <p>Debutto: <?php the_field('debutto'); ?></p>
              <p>Nazionalità: <?php the_field('nazionalita'); ?></p>

              <a href="<?php the_permalink(); ?>">
                <button class="button">Scopri di più</button>
              </a>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>

    <div class="navigation">
      <?php the_posts_pagination([
        'prev_text' => __('Pagina precedente'),
        'next_text' => __('Pagina successiva'),
      ]); ?>
    </div>
  <?php else : ?>
    <p>Nessun rider trovato.</p>
  <?php endif; ?>
</div>

<?php get_footer(); ?>