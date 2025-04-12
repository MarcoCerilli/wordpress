
<?php  get_header();  ?>


<?php  if (have_posts()) : while (have_posts()) : the_post() ; ?>

<?php

the_title();
the_content();
the_post_thumbnail( );
?>


<?php  endwhile; ?>

<?php else : ?>

  <?php echo "Non ci sono contenuti!!"  ?>

<?php  endif; ?>


<?php  get_footer();  ?>
