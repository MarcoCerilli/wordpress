<?php

/**
 * Template for displaying single rider posts
 * @subpackage Water Sports Club
 * @since 1.0
 * @version 0.1
 */

get_header(); ?>

<div class="container">
	<div class="content-area">
		<main id="skip-content" class="site-main" role="main">
			<?php
			// Layout e contenuto del rider
			$water_sports_club_layout_option = get_theme_mod('water_sports_club_theme_options', __('Right Sidebar', 'water-sports-club'));
			if ($water_sports_club_layout_option == 'Left Sidebar') { ?>
				<div class="row">
					<div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-1'); ?></div>
					<div class="content_area col-lg-8 col-md-8">
						<section id="rider_section">
							<?php
							while (have_posts()) : the_post();
								the_title('<h1>', '</h1>');
								the_content();

								// Recupero le tassonomie per 'stelle'
								$stelle_terms = get_the_terms(get_the_ID(), 'stelle');
								if ($stelle_terms && !is_wp_error($stelle_terms)) {
									$nomi_stelle = wp_list_pluck($stelle_terms, 'name');
									echo '<p>⭐ Stelle: ' . esc_html(implode(', ', $nomi_stelle)) . '</p>';
								} else {
									echo '<p>⭐ Nessuna valutazione</p>';
								}

								// Recupero le tassonomie per 'recensioni'
								$recensioni_terms = get_the_terms(get_the_ID(), 'recensioni');
								if ($recensioni_terms && !is_wp_error($recensioni_terms)) {
									$nomi_recensioni = wp_list_pluck($recensioni_terms, 'name');
									echo '<p>📝 Recensioni: ' . esc_html(implode(', ', $nomi_recensioni)) . '</p>';
								} else {
									echo '<p>📝 Nessuna recensione</p>';
								}

								// Commenti
								if (comments_open() || get_comments_number()) :
									comments_template();
								endif;
							endwhile;
							?>
						</section>
					</div>
					<div class="clearfix"></div>
				</div>
			<?php } ?>
		</main>
	</div>
</div>

<?php get_footer(); ?>