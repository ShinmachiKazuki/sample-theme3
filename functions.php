<?php
function theme_setup (){

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

function theme_styles () {
 wp_enqueue_style( 'theme_common',     get_template_directory_uri() . '/css/common.css' );
 wp_enqueue_style( 'theme_styles',     get_stylesheet_uri() );
 //wp_enqueue_style( 'theme_responsive', get_template_directory_uri() . '/css/responsive.css' );
 wp_enqueue_script( 'theme-move-script', get_template_directory_uri() . '/js/slideshow.js', array( 'jquery' ), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'theme_styles' );

function theme_widgets_init() {
	register_sidebar( array(
		'name'          => 'サイドバー',
		'id'            => 'sidebar-1',
		'description'   => '右のサイドバーのエリアですね',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'theme_widgets_init' );

function the_search_extend( $text ) {
	if ( is_search() ) {
		$query = trim( get_search_query() );
		$query = mb_convert_kana( $query, 'as', 'UTF-8' );

	if( !empty( $query ) ){
		$text = str_replace( $query, '<mark>' . $query . '</mark>', $text );
	}
}
	return $text;
}

add_action( 'the_excerpt', 'the_search_extend' );
add_action( 'the_title',   'the_search_extend' );
