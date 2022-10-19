<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?php wp_title(); ?></title>

	<link rel="shortcut icon" type="image/png" href="favicon.png">

	<script>
		(function() {
			document.documentElement.className = 'js'
		})();
	</script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header class="page-header">
		<div class="container">

			<a href="<?php echo site_url(); ?>/" class="logo">
				<img src="logo.svg" alt="">
			</a>

			<a href="#" class="nav-toggle"></a>
			<nav class="nav-collapse">
				<ul class="page-nav">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'main-menu', 'container' => '', 'items_wrap' => '%3$s'
						)
					);
					?>
				</ul>
			</nav>

		</div>
	</header>