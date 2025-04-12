<?php
/*

Template Name: Con Sidebar

*/

get_header(); //Questo carica il file header.php che contiene la barra di navigazione, il footer, ecc. 

?>

<?php do_action('water_sports_club_above_header_page'); ?>


<div class="row">
    <div class="col-md-8"> <!-- Questa colonna contiene il contenuto principale della pagina 8 di 12   -->



        <div class="container">
            <div id="primary" class="content-area">
                <main id="skip-content" class="site-main" role="main">
                    <?php
                    while (have_posts()) : the_post();

                        get_template_part('template-parts/page/content', 'page');

                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;

                    endwhile; // End of the loop.
                    ?>
                </main>
            </div>
        </div>

    </div> <!-- // Questa chiusura la riga principale della pagina 8 di 12   -->

    <div class="col-md-4"> <!-- Questa colonna contiene la sidebar sinistra del sito   -->

        <?php get_sidebar(); ?> <!-- // Questo carica il file sidebar.php che contiene la sidebar sinistra del sito  -->

    </div> <!-- // Questa chiusura la riga principale della pagina 4 di 12    -->

</div> <!-- // row   -->



<? get_footer(); ?> <!-- // Questo carica il file footer.php che contiene la barra di piè di pagina, il footer, ecc.   -->