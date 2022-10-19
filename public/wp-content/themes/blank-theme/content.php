<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
	<div class="entry-content">
		<?php the_content(); ?>
	</div>

	<?php
	if (is_single() && get_the_author_meta('description')) :
		get_template_part('author-bio');
	endif;
	?>

	<div class="navigation">
		<a class="button" href="/blog">Back to all posts</a>
	</div>
</article>