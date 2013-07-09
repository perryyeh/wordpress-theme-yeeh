<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till "main"
 *
 * @package WordPress
 * @subpackage Yeeh
 * @since yeeh 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0">
<!--[if lt IE 9]>
<script src="<?php bloginfo( 'template_url' ); ?>/static/html5.js"></script>
<![endif]-->
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>
<body>
<!--[if lt IE 9]>
<div class="no-ie678">You are using an older browser. Please upgrade to <a href="http://www.google.com/chrome" target="_blank">Chrome</a>/<a href="http://www.apple.com/safari/" target="_blank">Safari</a>/<a href="http://www.opera.com/" target="_blank">Opera</a>/<a href="http://www.mozilla.org/en-US/firefox/new/" target="_blank">Firefox</a>/<a href="http://windows.microsoft.com/en-us/internet-explorer/products/ie/home" target="_blank">Internet Explorer 9+</a>.</div>
<![endif]-->
<header class="header">
<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'h2'; ?>
<<?php echo $heading_tag; ?>>
<a class="sitetitle" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
</<?php echo $heading_tag; ?>>
<span class="tagline"><?php bloginfo( 'description' ); ?></span>
</header>
<nav class="nav" role="navigation">
<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
</nav>
<div class="search" role="search">
<form method="get" action="/"><label for="s">Search:</label><input name="s" id="s" placeholder="Search" accesskey="s" lang="zh-cn" autocomplete="false" x-webkit-speech webkit-grammar="builtin:translate" /></form>
</div>
<section class="content col" role="main">