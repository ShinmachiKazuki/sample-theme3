<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php wp_head(); ?>
</head>

<body>
	<header>
		<h1>
			<a href="<?php echo home_url( '/' ); ?>">
				<?php
				if ( has_custom_logo() ) {
				$custom_logo_id = get_theme_mod( 'custom_logo' );
				$image   = wp_get_attachment_image_src( $custom_logo_id, 'full' );
				$format  = '<a href="' . esc_url( home_url( '/' ) ) .'">';
				$format .= '<img src="' .$image[0]  . '"';
				$format .= ' width="'   .$image[1]  . '"';
				$format .= ' width="'   .$image[2]  . '"';
				$format .= ' alt="'     . esc_attr( get_bloginfo( 'name' )) . '">';
				$format .= '</a>';
				echo $format;
			}
				?>
			</a>
		</h1>

	<nav>
		<?php
			wp_nav_menu(
				array(
					'theme_location' => 'global'
				)
			);
		?>
	</nav>
