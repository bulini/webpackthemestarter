<?php
/**********************************************************
* enqueue your parent theme style if needed
* in this case including twentyseventeen styles and scripts
**********************************************************/
add_action('wp_enqueue_scripts', 'twentyseventeen_enqueue_assets');

function twentyseventeen_enqueue_assets() {
  // enqueue style from your parent theme
  wp_enqueue_style( 'twentyseventeen-style', get_template_directory_uri() . '/style.css' );

}

/*********************************
* enqueue your compiled bundle.js
* and compiled style.css
* defined in webpack.config.js
*********************************/
add_action( 'wp_enqueue_scripts', 'webpack_enqueue_assets' );

function webpack_enqueue_assets() {
  wp_enqueue_script( 'bundle', get_stylesheet_directory_uri() . '/dist/main.js', array('jquery'), 1, false );
  wp_enqueue_style( 'webpacktheme-style', get_stylesheet_directory_uri() . '/style.css' );
}
