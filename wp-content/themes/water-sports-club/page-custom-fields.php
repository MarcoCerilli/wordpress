<?php

/**
 * Template per la visualizzazione delle pagine, pagina Custom-fields
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
    endwhile; ?>
</main><!-- #main -->

<div class="ultimi-articoli">
    <h2>Ultimi Articoli</h2>

    <?php
    // Definizione della query per recuperare gli articoli
    $args = array(
        'post_type' => 'post', // recupera articoli (post)
        'posts_per_page' => 5, // numero di articoli da mostrare (gli ultimi 5)
        'orderby' => 'date', // ordina per data
        'order' => 'DESC' // ordine decrescente (gli articoli più recenti per primi)
    );

    // Esegui la query personalizzata
    $query = new WP_Query($args);

    // Verifica se ci sono post disponibili
    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>

        <!-- Recupera i metadati personalizzati -->
        <?php 
        $rider = get_post_meta(get_the_ID(), 'Rider', true);
        $manovra = get_post_meta(get_the_ID(), 'Manovra', true);
        ?>

        <!-- Visualizza il titolo del post e il link al singolo post -->
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

        <!-- Se il post ha una miniatura, la visualizziamo -->
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('thumbnail', array('class' => 'circle')); ?>
            </a>
        <?php endif; ?>

        <!-- Visualizza un estratto del contenuto del post -->
        <div class="entry-content">
            <?php the_excerpt(); ?>
        </div>

        <!-- Metadati Rider e Manovra sotto l'articolo con miglioramento del layout -->
        <div class="metadati-articolo">
            <?php if (!empty($rider)) : ?>
                <p><strong>Rider:</strong> <?php echo esc_html($rider); ?></p>
            <?php endif; ?>

            <?php if (!empty($manovra)) : ?>
                <p><strong>Manovra:</strong> <?php echo esc_html($manovra); ?></p>
            <?php endif; ?>
        </div>

    <?php endwhile;
    wp_reset_postdata(); // Ripristina la query globale di WordPress
    else : ?>
        <p>Nessun articolo disponibile.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
