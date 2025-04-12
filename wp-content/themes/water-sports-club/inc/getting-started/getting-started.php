<?php
//about theme info
add_action( 'admin_menu', 'water_sports_club_gettingstarted' );
function water_sports_club_gettingstarted() {    	
	add_theme_page( esc_html__('About Theme', 'water-sports-club'), esc_html__('About Theme', 'water-sports-club'), 'edit_theme_options', 'water_sports_club_guide', 'water_sports_club_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function water_sports_club_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getting-started/getting-started.css');
}
add_action('admin_enqueue_scripts', 'water_sports_club_admin_theme_style');

//guidline for about theme
function water_sports_club_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'water-sports-club' );

?>

<div class="wrapper-info">
	<div class="col-left">
		<div class="intro">
			<h3><?php esc_html_e( 'Welcome to Water Sports WordPress Theme', 'water-sports-club' ); ?> <span>Version: <?php echo esc_html($theme['Version']);?></span></h3>
		</div>
		<div class="started">
			<hr>
			<div class="free-doc">
				<div class="lz-4">
					<h4><?php esc_html_e( 'Start Customizing', 'water-sports-club' ); ?></h4>
					<ul>
						<span><?php esc_html_e( 'Go to', 'water-sports-club' ); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizer', 'water-sports-club' ); ?> </a> <?php esc_html_e( 'and start customizing your website', 'water-sports-club' ); ?></span>
					</ul>
				</div>
				<div class="lz-4">
					<h4><?php esc_html_e( 'Support', 'water-sports-club' ); ?></h4>
					<ul>
						<span><?php esc_html_e( 'Send your query to our', 'water-sports-club' ); ?> <a href="<?php echo esc_url( WATER_SPORTS_CLUB_SUPPORT ); ?>" target="_blank"> <?php esc_html_e( 'Support', 'water-sports-club' ); ?></a></span>
					</ul>
				</div>
			</div>
			<p><?php esc_html_e( 'The Water Sports Club theme displays your beachside sports and water sports club in style. For those who are experts in Sailing, Canoeing, Surfing, swimming, beach, boating, Scuba Diving, or any other water sports and work as an instructor for these sports, they can use this theme for designing a fabulous website that promotes their skills and services. It creates a nice aura on the screen because of its elegant, trendy, and sophisticated design. On top of it, this theme is retina-ready which makes the website look pixel-perfect on every screen size. Having a user-friendly theme options panel will be of great benefit since it allows users to tweak the theme and change several aspects of it without indulging themselves in the complicated coding procedures. The SEO optimized codes of this theme make it SEO friendly that will work positively for obtaining better ranks in search engines. The visually appealing theme banner will never fail to catch the visitors eye. The theme is built using the Bootstrap framework and is translation ready as it is made WPML and RTL compatible. There are several Call To Action (CTA) buttons included at desired places that make your website more interactive. It also comprises social media options and plenty of shortcodes. ', 'water-sports-club')?></p>
			<hr>			
			<div class="col-left-inner">
				<h3><?php esc_html_e( 'Get started with Free Water Sports Theme', 'water-sports-club' ); ?></h3>
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/customizer-image.png" alt="" />
			</div>
		</div>
	</div>
	<div class="col-right">
		<div class="col-left-area">
			<h3><?php esc_html_e('Premium Theme Information', 'water-sports-club'); ?></h3>
			<hr>
		</div>
		<div class="centerbold">
			<a href="<?php echo esc_url( WATER_SPORTS_CLUB_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'water-sports-club'); ?></a>
			<a href="<?php echo esc_url( WATER_SPORTS_CLUB_BUY_NOW ); ?>"><?php esc_html_e('Buy Pro', 'water-sports-club'); ?></a>
			<a href="<?php echo esc_url( WATER_SPORTS_CLUB_PRO_DOCS ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'water-sports-club'); ?></a>
			<hr class="secondhr">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/water-sports-club.jpg" alt="" />
		</div>
		<h3><?php esc_html_e( 'PREMIUM THEME FEATURES', 'water-sports-club'); ?></h3>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon01.png" alt="" />
			<h4><?php esc_html_e( 'Banner Slider', 'water-sports-club'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon02.png" alt="" />
			<h4><?php esc_html_e( 'Theme Options', 'water-sports-club'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon03.png" alt="" />
			<h4><?php esc_html_e( 'Custom Innerpage Banner', 'water-sports-club'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon04.png" alt="" />
			<h4><?php esc_html_e( 'Custom Colors and Images', 'water-sports-club'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon05.png" alt="" />
			<h4><?php esc_html_e( 'Fully Responsive', 'water-sports-club'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon06.png" alt="" />
			<h4><?php esc_html_e( 'Hide/Show Sections', 'water-sports-club'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon07.png" alt="" />
			<h4><?php esc_html_e( 'Woocommerce Support', 'water-sports-club'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon08.png" alt="" />
			<h4><?php esc_html_e( 'Limit to display number of Posts', 'water-sports-club'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon09.png" alt="" />
			<h4><?php esc_html_e( 'Multiple Page Templates', 'water-sports-club'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon10.png" alt="" />
			<h4><?php esc_html_e( 'Custom Read More link', 'water-sports-club'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon11.png" alt="" />
			<h4><?php esc_html_e( 'Code written with WordPress standard', 'water-sports-club'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon12.png" alt="" />
			<h4><?php esc_html_e( '100% Multi language', 'water-sports-club'); ?></h4>
		</div>
	</div>
</div>
<?php } ?>