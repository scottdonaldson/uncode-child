<?php

add_action('after_setup_theme', 'uncode_language_setup');

function uncode_language_setup() {
	load_child_theme_textdomain('uncode', get_stylesheet_directory() . '/languages');
}

function theme_enqueue_styles() {

	$production_mode = ot_get_option('_uncode_production');
	$resources_version = ($production_mode === 'on') ? null : rand();
	$parent_style = 'uncode-style';
	$child_style = array('uncode-custom-style');
	wp_enqueue_style($parent_style, get_template_directory_uri() . '/library/css/style.css', array(), $resources_version);
	wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css');

	wp_enqueue_script('child-script', get_stylesheet_directory_uri() . '/script.js', array('jquery'));

	?>
	<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-9215814-16', 'auto');
    ga('send', 'pageview');
    </script>
	<?php
}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

function title_format($content) {
	return '%s <img class="password-protected-lock" src="' . get_stylesheet_directory_uri() . '/lock.svg" />';
}
add_filter('private_title_format', 'title_format');
add_filter('protected_title_format', 'title_format');