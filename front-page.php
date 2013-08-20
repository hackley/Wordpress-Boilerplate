<?php get_header(); ?>

<!-- This is the front-page.php file, which should act as the static homepage -->

<!-- Start Loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<!-- Content for this page -->
	<?php the_title(); ?>
	<?php the_content(); ?>

<?php endwhile; else: ?>

	<p>No Posts to display!</p>

<?php endif; ?>
<!-- End Loop -->


<?php get_footer(); ?>