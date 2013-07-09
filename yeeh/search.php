<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Yeeh
 * @since yeeh 1.0.1
 */

get_header(); ?>
<section class="col-main">
<?php if ( have_posts() ) : ?>
				<h1 class="title"><?php printf( __( 'Search Results for: %s', 'twentyten' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<?php
				/* Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called loop-search.php and that will be used instead.
				 */
				 get_template_part( 'loop', 'search' );
				?>
<?php else : ?>
<article class="post" role="article">
<header class="entry-header">
<h2 class="entry-title"><?php _e( 'Not Found', 'twentyten' ); ?></h2>
</header>
<div class="entry-content">
<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentyten' ); ?></p>
</div>
</article>
<?php endif; ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
