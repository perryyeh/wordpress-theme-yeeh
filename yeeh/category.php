<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Yeeh
 * @since yeeh 1.0.1
 */

get_header(); ?>
<section class="col-main">
<h1 class="title"><?php printf( __( 'Category Archives: %s', 'twentyten' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>
<?php
$category_description = category_description();
if ( ! empty( $category_description ) )
	echo '<div class="title-meta">' . $category_description . '</div>';
/* Run the loop for the category page to output the posts.
 * If you want to overload this in a child theme then include a file
 * called loop-category.php and that will be used instead.
 */
get_template_part( 'loop', 'category' );
?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
