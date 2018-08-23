<?php
function theme_setup () {

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	$args = array(
	 	'height'      => 0,
	 	'width'       => 0,
	 	'flex-height' => true,
	 	'flex-width'  => true,
	 	'header-text' => array( 'site-title', 'site-description' )
	);
	add_theme_support( 'custom-logo', $args );

	register_nav_menus( array(
		'global' => 'Global Menu'
	) );
}

add_action( 'after_setup_theme', 'theme_setup' );
