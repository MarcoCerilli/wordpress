<?php
/**
 * The template for displaying all pages
 * @subpackage Water Sports Club
 * @since 1.0
 * @version 0.1
 */

get_header(); ?>

<?php do_action( 'water_sports_club_above_header_page' ); ?>

<div class="container">
	<div id="primary" class="content-area">
		<main id="skip-content" class="site-main" role="main">
			<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/page/content', 'page' );

					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
			?>
		</main>
	</div>
</div>

<?php do_action( 'water_sports_club_above_footer_page' ); ?>
<?php get_sidebar(); ?>
<?php get_footer();?>