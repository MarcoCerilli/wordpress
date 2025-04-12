<?php
/**
 * The header for our theme
 *
 * @subpackage Water Sports Club
 * @since 1.0
 * @version 0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

	<?php wp_head(); ?>



	
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}?>

<a class="screen-reader-text skip-link" href="#skip-content"><?php esc_html_e( 'Skip to content', 'water-sports-club' ); ?></a>

<div id="header">
	<?php if (get_theme_mod('water_sports_club_hide_show_topbar',false) == true) {?>
		<div class="topbar">
				<div class="row">
					<div class="col-lg-6 col-md-5">
						<?php if(get_theme_mod('water_sports_club_facebook_url','') || get_theme_mod('water_sports_club_twitter_url','') || get_theme_mod('water_sports_club_linkedin_url','') || get_theme_mod('water_sports_club_rss_url','') || get_theme_mod('water_sports_club_youtube_url','')){ ?>
							<div class="social-icons">
								<p><?php esc_html_e('Follow Us: ', 'water-sports-club'); ?></p>
								<?php if(get_theme_mod('water_sports_club_facebook_url','')){ ?>
									<a href="<?php echo esc_url(get_theme_mod('water_sports_club_facebook_url','')); ?>"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php echo esc_html('Facebook', 'water-sports-club'); ?></span></a>
								<?php }?>
								<?php if(get_theme_mod('water_sports_club_twitter_url','')){ ?>
									<a href="<?php echo esc_url(get_theme_mod('water_sports_club_twitter_url','')); ?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php echo esc_html('Twitter', 'water-sports-club'); ?></span></a>
								<?php }?>
								<?php if(get_theme_mod('water_sports_club_linkedin_url','')){ ?>
									<a href="<?php echo esc_url(get_theme_mod('water_sports_club_linkedin_url','')); ?>"><i class="fab fa-linkedin-in"></i><span class="screen-reader-text"><?php echo esc_html('Linkedin', 'water-sports-club'); ?></span></a>
								<?php }?>
								<?php if(get_theme_mod('water_sports_club_rss_url','')){ ?>
									<a href="<?php echo esc_url(get_theme_mod('water_sports_club_rss_url','')); ?>"><i class="fas fa-rss"></i><span class="screen-reader-text"><?php echo esc_html('RSS', 'water-sports-club'); ?></span></a>
								<?php }?>
								<?php if(get_theme_mod('water_sports_club_youtube_url','')){ ?>
									<a href="<?php echo esc_url(get_theme_mod('water_sports_club_youtube_url','')); ?>"><i class="fab fa-youtube"></i><span class="screen-reader-text"><?php echo esc_html('Youtube', 'water-sports-club'); ?></span></a>
								<?php }?>
							</div>
						<?php }?>
					</div>
					<div class="col-lg-4 col-md-4">
						<?php if (get_theme_mod('water_sports_club_mail','')) {?>
							<div class="mail">
								<a href="mailto:<?php echo esc_attr(get_theme_mod('water_sports_club_mail','')); ?>"><i class="far fa-envelope"></i><?php echo esc_html(get_theme_mod('water_sports_club_mail','')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('water_sports_club_mail','')); ?></span></a>
							</div>
						<?php } ?>
					</div>
					<div class="col-lg-2 col-md-3">
						<?php if (get_theme_mod('water_sports_club_call','')) {?>
							<div class="call">
								<span><a href="tel:<?php echo esc_attr(get_theme_mod('water_sports_club_call','')); ?>"><i class="fas fa-phone"></i><?php echo esc_html(get_theme_mod('water_sports_club_call','')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('water_sports_club_call','')); ?></span></a></span>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	<?php }?>
	<div class="bottom-header">
		<div class="container">
			<div class="row">
				<div class="logo col-lg-3 col-md-5">
					<?php if ( has_custom_logo() ) : ?>
	            		<?php the_custom_logo(); ?>
		            <?php endif; ?>
	             	<?php if (get_theme_mod('water_sports_club_show_site_title',true)) {?>
              			<?php $blog_info = get_bloginfo( 'name' ); ?>
		                <?php if ( ! empty( $blog_info ) ) : ?>
		                  	<?php if ( is_front_page() && is_home() ) : ?>
		                    	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		                  	<?php else : ?>
	                      		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
	                  		<?php endif; ?>
		                <?php endif; ?>
		            <?php }?>
		            <?php if (get_theme_mod('water_sports_club_show_tagline',true)) {?>
		                <?php
	                  		$description = get_bloginfo( 'description', 'display' );
		                  	if ( $description || is_customize_preview() ) :
		                ?>
	                  	<p class="site-description">
	                    	<?php echo esc_attr($description); ?>
	                  	</p>
	              		<?php endif; ?>
              		<?php }?>
				</div>
				<div class="menu-section col-lg-8 col-md-6 col-6">
					<div class="toggle-menu responsive-menu">
						<?php if(has_nav_menu('primary')){ ?>
			            	<button onclick="water_sports_club_open()" role="tab" class="mobile-menu"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','water-sports-club'); ?></span></button>
			            <?php }?>
			        </div>
					<div id="sidelong-menu" class="nav sidenav">
		                <nav id="primary-site-navigation" class="nav-menu" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'water-sports-club' ); ?>">
		                  	<?php if(has_nav_menu('primary')){
			                    wp_nav_menu( array( 
									'theme_location' => 'primary',
									'container_class' => 'main-menu-navigation clearfix' ,
									'menu_class' => 'clearfix',
									'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
									'fallback_cb' => 'wp_page_menu',
			                    ) ); 
		                  	} ?>
		                  	<a href="javascript:void(0)" class="closebtn responsive-menu" onclick="water_sports_club_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','water-sports-club'); ?></span></a>
		                </nav>
		            </div>
				</div>
				<div class="col-lg-1 col-md-1 col-6">
					<div class="search-box">
						<button  onclick="water_sports_club_search_open()" class="search-toggle"><i class="fas fa-search"></i></button>
					</div>
				</div>
				<div class="search-outer">
					<div class="search-inner">
			        	<?php get_search_form(); ?>
		        	</div>
		        	<button onclick="water_sports_club_search_close()" class="search-close"><i class="fas fa-times"></i></button>
		        </div>
			</div>
		</div>
	</div>
</div>

<?php if(is_singular()) {?>
	<div id="inner-pages-header">
		<div class="header-overlay"></div>
	    <div class="header-content-box">
		    <div class="container text-center"> 
		      	<h1><?php single_post_title(); ?></h1>
		    </div>
		</div>
	</div>
<?php } ?>