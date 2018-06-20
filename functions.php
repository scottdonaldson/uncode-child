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
	return '%s <svg class="password-protected-lock" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
		<g transform="matrix(1.35567 0 0 1.35567-452.35-687.47)">
			<g transform="matrix(1.52062 0 0 1.52062-204.35-290.39)">
				<path d="m16.444 1039.19v-2.23c0-3.03-2.463-5.49-5.49-5.49-3.03 0-5.49 2.463-5.49 5.49v2.23c-.433.09-.759.475-.759.935v8.358c0 .526.428.955.955.955h10.587c.527 0 .955-.429.955-.955v-8.358c0-.459-.326-.844-.759-.935m-4.207 7.125c.019.105-.051.188-.156.188h-2.229c-.105 0-.175-.083-.156-.188l.355-1.881c-.269-.245-.437-.598-.437-.99 0-.74.6-1.34 1.34-1.34.74 0 1.34.6 1.34 1.34 0 .381-.16.725-.416.969zm2.297-7.145h-7.16v-2.21c0-1.974 1.606-3.58 3.58-3.58 1.974 0 3.58 1.606 3.58 3.58z" transform="matrix(.81569 0 0 .81569 360.41-308.71)"/>
			</g>
		</g>
	</svg>';
}
add_filter('private_title_format', 'title_format');
add_filter('protected_title_format', 'title_format');