<?php
	get_header();

	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
?>

<!-- Page Hero -->
<?php if ( get_field('hero', $page_id) ) : ?>
	<section class="hero">
		<div class="container">

		<?php the_field('hero'); ?>

		</div>
	</section>
<?php
	$image = get_field('hero_image');
	echo get_page_hero_image_css($image);

endif;
?>
<!-- End Page Hero -->

<!-- Main content -->
<?php // Normal page content
	if (get_the_content()) : ?>

	<section class="panel panel--main-content">
		<div class="container">

			<?php the_content(); ?>

		</div>
	</section>

<?php endif; ?>


<?php // ACF repeater fields
	$panels = get_field('panels');
	if ($panels) {
		foreach ($panels as $panel) {
			echo '<section '.(!empty($panel['id'])? 'id="'.$panel['id'].'" ' : '')
				.'class="panel'.(!empty($panel['class'])? ' panel--'.$panel['class'] : '').'">'
					.'<div class="container">'
						.(!empty($panel['content'])? $panel['content'] : '')
					.'</div>'
				.'</section>';
		}
	}
?>
<!-- End main content -->

<?php
		endwhile;
	endif;

	get_footer();
?>
