<?php
add_action('wp_enqueue_scripts', 'childhood_styles');
add_action('wp_enqueue_scripts', 'childhood_scripts');


function childhood_styles()
{
	wp_enqueue_style('childhood-style', get_stylesheet_uri());
	wp_enqueue_style(
		'bootstrap-style',
		get_template_directory_uri() . '/assets/css/bootstrap.css'
	);
	wp_enqueue_style(
		'header-style',
		get_template_directory_uri() . '/assets/css/style.css'
	);
	wp_enqueue_style(
		'flexslider-style',
		get_template_directory_uri() . '/assets/css/flexslider.css'
	);
	wp_enqueue_style(
		'animate-style',
		'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css'
	);
};


// ? ниже подключаются скрипты
function childhood_scripts()
{
	wp_enqueue_script('childhood-scripts', get_template_directory_uri() . '/assets/js/bootstrap-3.1.1.min.js', array(), null, true);
	wp_enqueue_script('childhood-scripts', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), null, true);
	wp_enqueue_script('childhood-scripts', get_template_directory_uri() . '/assets/js/classie.js', array('jquery'), null, true);
	wp_enqueue_script('childhood-scripts', get_template_directory_uri() . '/assets/js/cbpViewModeSwitch.js', array('jquery'), null, true);
	wp_enqueue_script('childhood-scripts', get_template_directory_uri() . '/assets/js/imagezoom.js', array('jquery'), null, true);
	wp_enqueue_script('childhood-scripts', get_template_directory_uri() . '/assets/js/jquery.flexisel.js', array('jquery'), null, true);
	wp_enqueue_script('childhood-scripts', get_template_directory_uri() . '/assets/js/jquery.flexslider.js', array('jquery'), null, true);
	wp_enqueue_script('childhood-scripts', get_template_directory_uri() . '/assets/js/responsive-tabs.js', array('jquery'), null, true);
	wp_enqueue_script('childhood-scripts', get_template_directory_uri() . '/assets/js/simpleCart.min.js', array('jquery'), null, true);
	wp_enqueue_script('childhood-scripts', get_template_directory_uri() . '/assets/js/responsiveslides.min.js', array('jquery'), null, true);
}

add_theme_support('custom-logo');
