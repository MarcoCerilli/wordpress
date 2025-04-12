<?php
/*
 Template Name: Custom Blog Page
*/
?>

<?php get_header(); ?>

<div class="blog-container">
    <?php

    $pagina_attuale = get_query_var('paged') ? get_query_var('paged') : 1;

    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 6,  // Limita a 6 articoli per pagina (modificabile)
        'paged'          => $pagina_attuale,
        'order' => 'ASC',
        'orderby' => 'name'
    );

    $query = new WP_Query($args);
    ?>

    <?php if ($query->have_posts()) : ?>
        <div class="blog-grid">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="blog-item">
                    <article id="post-<?php the_ID(); ?>" <?php post_class(['custom-post-class']); ?>>
                        <header class="entry-header">
                            <a href="<?php the_permalink(); ?>" class="blog-title">
                                <h2><?php the_title(); ?></h2>
                            </a>

                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('Custom-Blog', ['class' => 'blog-thumbnail']); ?>
                                </a>
                            <?php endif; ?>
                        </header>

                        <div class="blog-meta">
                            <div class="blog-comments">
                                <?php if (comments_open() || get_comments_number()) : ?>
                                    <a href="<?php comments_link(); ?>">
                                        <?php comments_number(__('Nessun commento', 'textdomain'), __('1 commento', 'textdomain'), __('% commenti', 'textdomain')); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="blog-categories">
                                Categorie: <?php the_category(' | '); ?>
                            </div>
                            <div class="blog-tags">
                                <?php if (has_tag()) : ?>
                                    Tags: <?php the_tags('', ', ', ''); ?>
                                <?php else : ?>
                                    <span>No Tags</span>
                                <?php endif; ?>
                            </div>
                            <div class="blog-author">
                                Autore: <?php the_author(); ?>
                                <hr>
                                <?php
                                // Recupera e visualizza i campi personalizzati 'Rider' e 'Manovra'
                                $rider_value = get_post_meta(get_the_ID(), 'Rider', true);
                                $manovra_value = get_post_meta(get_the_ID(), 'Manovra', true);

                                if ($rider_value) {
                                    echo '<p class="custom-meta-field rider-field"><strong>Rider:</strong> ' . esc_html($rider_value) . '</p>';
                                }
                                if ($manovra_value) {
                                    echo '<p class="custom-meta-field manovra-field"><strong>Manovra:</strong> ' . esc_html($manovra_value) . '</p>';
                                }
                                ?>
                            </div>
                        </div>
                    </article>
                </div>
            <?php endwhile; ?>
        </div>
        <!-- Link di navigazione tra le pagine -->
        <?php if ($query->max_num_pages > 1) : ?>
            <div class="pagination">
                <?php
                echo paginate_links(array(
                    'total' => $query->max_num_pages,
                    'prev_text' => '&laquo; Precedente',
                    'next_text' => 'Successivo &raquo;',
                ));
                ?>
            </div>
        <?php endif; ?>

    <?php else : ?>
        <p>Nessun articolo trovato con i tag selezionati.</p>
    <?php endif; ?>

    <?php wp_reset_postdata(); ?>
</div>

<?php get_footer(); ?>