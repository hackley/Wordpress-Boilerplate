<?php the_title(); ?> <br/>

Posted in: <?php the_category(', '); ?> <br/>
Written by: <?php the_author(); ?> <br/>
On: <?php the_time('F j, Y'); ?> <br/>


<?php if(is_single()): ?>

	<?php the_content(); ?>
	<?php comments_template(); ?>

<?php else: ?>

	<?php the_excerpt(); ?>
	<a href="<?php the_permalink(); ?>">Continue Reading &rarr;</a>

<?php endif; ?>

<hr />