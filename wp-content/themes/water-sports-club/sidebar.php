<?php

/**
 * The sidebar containing the main widget area
 * 
 * @subpackage Water Sports Club
 * @since 1.0
 * @version 0.1
 */


if (! is_active_sidebar('sidebar-1')) {
	return;
}
?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


	<?php endwhile; ?>

<?php else : ?>

<?php echo "Non ci sono Rider attivi nel blog. Controlla l'aggiunta dei widget nel pannello di amministrazione."?>

<?php endif; ?>








<h1> Sono dentro la sidebar.php</h1>


<aside id="sidebar" class="widget-area" role="complementary">
	<?php dynamic_sidebar('sidebar-1'); ?>
</aside>