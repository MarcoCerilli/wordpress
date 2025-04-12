<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="skip-content" role="main">

	<?php do_action( 'water_sports_club_above_slider' ); ?>

	<?php if( get_theme_mod('water_sports_club_slider_hide_show') != ''){ ?>
		<section id="slider">
		  	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
			    <?php $water_sports_club_slider_pages = array();
		      	for ( $count = 1; $count <= 4; $count++ ) {
			        $mod = intval( get_theme_mod( 'water_sports_club_slider' . $count ));
			        if ( 'page-none-selected' != $mod ) {
			          $water_sports_club_slider_pages[] = $mod;
			        }
		      	}
		      	if( !empty($water_sports_club_slider_pages) ) :
			        $args = array(
			          	'post_type' => 'page',
			          	'post__in' => $water_sports_club_slider_pages,
			          	'orderby' => 'post__in'
			        );
			        $query = new WP_Query( $args );
			        if ( $query->have_posts() ) :
			          $i = 1;
			    ?>     
				    <div class="carousel-inner" role="listbox">
				      	<?php  while ( $query->have_posts() ) : $query->the_post(); ?>
					        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
					        	<?php if(has_post_thumbnail()) {?>
	            					<img src="<?php esc_url(the_post_thumbnail_url('full')); ?>" alt="<?php the_title_attribute(); ?> "/>
	            				<?php } else {?>
	            					<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/slider.png" alt="<?php the_title_attribute(); ?> "/>
            					<?php }?>
								<div class="slider-background"></div>
								<?php
									$water_sports_club_slider_effect = get_theme_mod('water_sports_club_slider_effect', '') 
								?>
					          	<div class="carousel-caption <?php echo ($water_sports_club_slider_effect); ?>">
						            <div class="inner_carousel">
						              	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
										  <p>"<?php $water_sports_club_excerpt = get_the_excerpt(); echo esc_html( water_sports_club_string_limit_words( $water_sports_club_excerpt, esc_attr(get_theme_mod('water_sports_club_slider_excerpt_length','3') ) )); ?>"</p>
						              	<div class="read-btn">
						              		<a href="<?php the_permalink(); ?>"><?php echo esc_html('READ MORE', 'water-sports-club') ?><span class="screen-reader-text"><?php echo esc_html('READ MORE', 'water-sports-club') ?></span></a>
						              	</div>
						            </div>
					          	</div>
					        </div>
				      	<?php $i++; endwhile; 
				      	wp_reset_postdata();?>
				    </div>
			    <?php else : ?>
			    	<div class="no-postfound"></div>
	      		<?php endif;
			    endif;?>
			    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		          	<span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-arrow-left"></i></span>
		          <span class="screen-reader-text"><?php esc_html_e( 'Previous','water-sports-club' );?></span>
		        </a>
		        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		          	<span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-arrow-right"></i></span>
		          <span class="screen-reader-text"><?php esc_html_e( 'Next','water-sports-club' );?></span>
		        </a>
		  	</div>
		  	<div class="clearfix"></div>
		</section>
	<?php }?>

	<?php do_action('water_sports_club_below_slider'); ?>

	<section id="our-services">
		<div class="container">
			<div class="service-title">
				<?php if (get_theme_mod('water_sports_club_course_heading','')) { ?>
					<h2><?php echo esc_html(get_theme_mod('water_sports_club_course_heading','')); ?></h2>
				<?php } ?>
				<?php if (get_theme_mod('water_sports_club_courses_subheading_text','')) { ?>
					<p><?php echo esc_html(get_theme_mod('water_sports_club_courses_subheading_text','')); ?></p>
				<?php } ?>
			</div>
			<div class="service-box">
	            <div class="row">
		      		<?php $water_sports_club_catData1 =  get_theme_mod('water_sports_club_category_setting');
      				if($water_sports_club_catData1){ 
	      				$page_query = new WP_Query(array( 'category_name' => esc_html($water_sports_club_catData1 ,'water-sports-club')));?>
		        		<?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>	
		          			<div class="col-lg-4 col-md-6">
		          				<div class="service-section">
		      						<div class="service-img">
							      		<?php the_post_thumbnail(); ?>
							  		</div>
	          						<div class="service-content">
					            		<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
					            		<p><?php $water_sports_club_excerpt = get_the_excerpt(); echo esc_html( water_sports_club_string_limit_words( $water_sports_club_excerpt,12 ) ); ?></p>
					            		<div class="read-btn">
						            		<a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','water-sports-club'); ?><span class="screen-reader-text"><?php esc_html_e('READ MORE','water-sports-club'); ?></span></a>
								       	</div>
		            				</div>	
		          				</div>
						    </div>
		          		<?php endwhile; 
		          	wp_reset_postdata();
		      		}?>
	      		</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</section>

	<?php do_action('water_sports_club_below_service_section'); ?>

	<div class="container">
	  	<?php while ( have_posts() ) : the_post(); ?>
	  		<div class="lz-content">
	        	<?php the_content(); ?>
	        </div>
	    <?php endwhile; // end of the loop. ?>
	</div>
</main>

<?php get_footer(); ?>