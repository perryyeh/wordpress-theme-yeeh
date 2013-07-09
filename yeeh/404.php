<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Yeeh
 * @since yeeh 1.0.1
 */

get_header(); ?>
<article class="post" role="article">
<header class="entry-header">
<h2 class="entry-title"><?php _e( 'Not Found', 'twentyten' ); ?></h2>
</header>
<div class="entry-content">
<?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'twentyten' ); ?></p>
</div>
</article>
<?php get_footer(); ?>