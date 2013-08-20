<?php get_header(); ?>

<!-- This is the single-custom.php file, which acts as a template for a single "custom" post type -->

<!-- Start Loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<!-- Content for this post -->
	<?php the_title(); ?>
	<?php the_field( 'description' ); ?>

<?php endwhile; else: ?>

	<p>No Posts to display!</p>

<?php endif; ?>
<!-- End Loop -->


<?php get_footer(); ?>