<?php
/**
 * Template for displaying single event posts
 * @subpackage Water Sports Club
 * @since 1.0
 * @version 0.1
 */

get_header(); ?>

<div class="container">
	<div class="content-area">
		<main id="skip-content" class="site-main" role="main">
			<?php
			$water_sports_club_layout_option = get_theme_mod( 'water_sports_club_theme_options', __( 'Right Sidebar', 'water-sports-club' ) );
			if($water_sports_club_layout_option == 'Left Sidebar'){ ?>
				<div class="row">
					<div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-1'); ?></div>
					<div class="content_area col-lg-8 col-md-8">
						<section id="event_section">
							<?php
							while ( have_posts() ) : the_post();
								// Mostra i campi personalizzati per gli eventi
								the_title('<h1>', '</h1>');
								the_content();

								// Se hai campi personalizzati come data_evento
								$data_evento = get_field('data_evento');
								if ($data_evento) {
									echo '<p>Data evento: ' . esc_html($data_evento) . '</p>';
								}

								// Mostra eventuali recensioni o stelle
								$stelle = get_field('stelle');
								if ($stelle) {
									echo '<p>Stelle: ' . esc_html($stelle) . '</p>';
								}

								$recensioni = get_field('recensioni');
								if ($recensioni) {
									echo '<p>Recensioni: ' . esc_html($recensioni) . '</p>';
								}

								// Commenti
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
							endwhile;
							?>
						</section>
					</div>
					<div class="clearfix"></div>
				</div>			
			<?php } else if($water_sports_club_layout_option == 'Right Sidebar'){ ?>
				<!-- Layout con Sidebar a destra -->
			<?php } ?>
		</main>
	</div>
</div>

<?php get_footer(); ?>
