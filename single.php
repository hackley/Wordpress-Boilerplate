<?php get_header(); ?>

<!-- This is the single.php file, used for "posts" -->

<!-- Start Loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<!-- Post content -->
	<?php the_title(); ?>
	<?php the_content(); ?>

<?php endwhile; else: ?>

	<p>No Posts to display!</p>

<?php endif; ?>
<!-- End Loop -->


<?php get_footer(); ?>