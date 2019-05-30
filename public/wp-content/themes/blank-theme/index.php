<?php
get_header();

$page_id = ('page' == get_option('show_on_front')? get_option('page_for_posts') : get_the_ID());

?>

<!-- Page Hero -->
<?php if ( get_field('page_hero_content', $page_id) ) : ?>
	<section class="page-hero">
		<div class="container">

		<?php the_field('page_hero_content', $page_id); ?>

		</div>
	</section>
<?php
	$image = get_field('page_hero_image', $page_id);
	echo get_page_hero_image_css($image);

endif;
?>
<!-- End Page Hero -->

<!-- Page Posts List -->
<section class="panel panel--posts-container">
	<div class="container">

		<div class="posts">
		<?php
			if (have_posts())
			{
				while ( have_posts() ) : the_post();

					get_template_part( 'content', 'grid-post' );

				endwhile;
			}
		?>
		</div>

	</div>
</section>
<!-- End Page Posts List -->

<?php
get_footer();
?>