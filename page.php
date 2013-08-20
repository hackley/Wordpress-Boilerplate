<?php get_header(); ?>

<!-- This is the page.php file, used for "pages" -->

<!-- Start Loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<!-- Page content -->
	<?php the_title(); ?>
	<?php the_content(); ?>

<?php endwhile; else: ?>

	<p>No Posts to display!</p>

<?php endif; ?>
<!-- End Loop -->


<?php get_footer(); ?>