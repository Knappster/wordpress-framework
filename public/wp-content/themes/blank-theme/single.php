<?php
get_header(); ?>

<!-- Page Hero -->
	<section class="hero hero--post">
		<div class="container">

		<?php the_title('<h1>', '</h1>'); ?>

		</div>
	</section>
	<?php
		echo get_post_hero_image_css();
	?>
<!-- End Page Hero -->

<?php
while ( have_posts() ) : the_post(); ?>

	<section class="panel panel--posts">
		<div class="container">

			<?php get_template_part( 'content', get_post_format() ); ?>

		</div>
	</section>

<?php
endwhile;

get_footer();
?>
