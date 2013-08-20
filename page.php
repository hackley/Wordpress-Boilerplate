<?php get_header(); ?>

<h5>This is the page.php file</h5>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<h3><?php the_title(); ?></h3>
	<?php the_content(); ?>
	<hr>

<?php endwhile; else: ?>

	<p>No Posts to display!</p>

<?php endif; ?>




<?php get_footer(); ?>