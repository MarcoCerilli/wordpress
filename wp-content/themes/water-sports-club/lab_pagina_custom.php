<?php
/* Template name: Parametri Articolo e Pagina */
?>

<?php get_header(); ?>

<main id="primary" class="site-main">

    <h1>Articoli nella categoria "Slalom"</h1>

    <?php
    // Imposta i parametri della query per recuperare gli articoli della categoria 'slalom'
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 3, // Mostra solo 3 articoli
        'category_name' => 'slalom', // Filtra per categoria
        'orderby' => 'date', // Ordina per data
        'order' => 'DESC' // Ordine decrescente
    );

    // Esegui la query
    $lab_page = new WP_Query($args);

    // Verifica se ci sono articoli
    if ($lab_page->have_posts()) :
        // Loop sugli articoli
        echo '<div class="articles-grid">';
        while ($lab_page->have_posts()) : $lab_page->the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('article-item'); ?>>
                <header class="entry-header">
                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                </header>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </article>
            <?php
        endwhile;
        echo '</div>'; // Close articles grid

        // Aggiungi la paginazione se ci sono più articoli
        if ($lab_page->max_num_pages > 1) :
            ?>
            <div class="pagination">
                <?php
                echo paginate_links(array(
                    'total' => $lab_page->max_num_pages
                ));
                ?>
            </div>
            <?php
        endif;
    else :
        echo '<p>La pagina non è stata trovata.</p>';
    endif;

    // Ripristina i dati globali della query
    wp_reset_postdata();
    ?>

</main><!-- #primary -->

<?php get_footer(); ?>
