<?php get_header(); ?>

<!-- This is the home.php file, which is essentially the "blog" page -->

<!-- Start Loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<!-- List Blog Posts -->
	<?php the_title(); ?>
	<?php the_content(); ?>
	<hr>

<?php endwhile; else: ?>

	<p>No Posts to display!</p>

<?php endif; ?>
<!-- End Loop -->


<?php get_footer(); ?>