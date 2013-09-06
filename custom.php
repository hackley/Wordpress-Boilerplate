<?php 
	/*
		Template Name: Custom Page
	*/
?>

<?php get_header(); ?>


<!-- This is the custom.php file, as page tempalte -->


<?php 
	// List all posts with type "custom"
	$args = array(
		'post_type' => 'custom'
	);

	$the_query = new WP_Query( $args );
?>

<!-- Start Loop -->
<?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

	<!--List the posts -->
	<?php the_title(); ?>
	<a href="<?php the_permalink(); ?>"><?php the_permalink(); ?></a>
	<hr>

<?php endwhile; else: ?>

	<p>No Posts to display!</p>

<?php endif; ?>
<!-- End Loop -->


<?php get_footer(); ?>