<!DOCTYPE html>
<html>
	<head>
		
		<title>
			<?php wp_title( '-', true, 'right' ); ?>
			<?php bloginfo( 'name' ); ?>
		</title>

		<?php wp_head(); ?>
	</head>
	<body>

		<header>
			<?php // include Main menu

				$args = array(
					'menu' => 'main-menu'
				);

				wp_nav_menu( $args);

			?>
		</header>

		<main>