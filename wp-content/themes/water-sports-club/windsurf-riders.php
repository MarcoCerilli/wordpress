<?php
/*  Template Name: Riders  */
get_header();
?>

<div class="row d-flex flex-wrap justify-content-between"> <!-- Layout flexbox per gestione colonne -->

  <?php
  // Definisci la query per i post di tipo "rider"
  $args = array(
    'post_type' => 'rider', // Nome del post type
    'posts_per_page' => -1,  // Carica tutti i post (puoi limitare il numero di post cambiando questo valore)
  );

  $riders = new WP_Query($args);

  if ($riders->have_posts()) :
    while ($riders->have_posts()) :
      $riders->the_post();
  ?>

      <div class="col-12 col-md-4 mb-4"> <!-- Responsive layout: 12 colonne su mobile, 4 su desktop -->
        <div class="card">
          <div class="container">
            <?php if (has_post_thumbnail()) : ?>
              <!-- Verifica se esiste una thumbnail e visualizzala -->
              <?php the_post_thumbnail('medium'); ?> <!-- Usa un formato immagine che si adatta meglio -->
            <?php endif; ?>

            <h2><?php the_title(); ?></h2>

            <p class="title">Età: <?php the_field('eta'); ?></p>
            <p>Debutto: <?php the_field('debutto'); ?></p>
            <p>Nazionalità: <?php the_field('nazionalita'); ?></p>

            <a href="<?php the_permalink(); ?>">
              <button class="button">Scopri di più</button>
            </a>
          </div>
        </div>
      </div>

    <?php endwhile; ?>

  <?php else : ?>
    <p>Nessun atleta trovato.</p>

  <?php endif; ?>

</div> <!-- Fine della riga -->

<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>
