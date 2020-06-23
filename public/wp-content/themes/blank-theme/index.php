<?php
get_header();

$page_id = ('page' == get_option('show_on_front')? get_option('page_for_posts') : get_the_ID());

?>

<!-- Page Hero -->
	<section class="page-hero">
		<div class="container">

			<h1>Page Hero</h1>

		</div>
	</section>
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