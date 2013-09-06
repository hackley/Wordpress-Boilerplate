<?php get_header(); ?>

<!-- This is the single-custom.php file, which acts as a template for a single "custom" post type -->

<!-- Start Loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<!-- Content for this post -->
	<?php the_title(); ?>

	<hr>

	<?php the_post_thumbnail(); ?>

	Custom field 1: <?php echo get_post_meta( get_the_ID(), 'CUSTOM_FIELD1', true ); ?><br/>
	Custom field 2: <?php echo get_post_meta( get_the_ID(), 'CUSTOM_FIELD2', true ); ?><br/>

<?php endwhile; else: ?>

	<p>No Posts to display!</p>

<?php endif; ?>
<!-- End Loop -->


<?php get_footer(); ?>