<?php
/**
 * The loop that displays a page.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-page.php.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.2
 */
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<article class="post page" role="article">
<header class="entry-header">
<?php if ( is_front_page() ) { ?>
<h2 class="entry-title"><?php the_title(); ?></h2>
<?php } else { ?>
<h1 class="entry-title"><?php the_title(); ?></h1>
<?php } ?>
<div class="entry-meta">
<?php printf( __( '<span class="entry-author">By %1$s </span>', 'twentyten' ),
		sprintf( '<a href="%1$s" title="%2$s">%3$s</a>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'twentyten' ), get_the_author() ) ),
			get_the_author()
		)
	); ?>
<?php if ( count( get_the_category() ) ) : ?>
<?php printf( __( '<span class="%1$s">In %2$s </span>', 'twentyten' ), 'entry-cate', get_the_category_list( ', ' ) ); ?>
<?php endif; ?>
<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="entry-edit">', '</span>' ); ?>
<span class="entry-comment"><?php comments_popup_link( __( 'Leave a comment', 'twentyten' ), __( '1 Comment', 'twentyten' ), __( '% Comments', 'twentyten' ) ); ?></span>
<?php
$tags_list = get_the_tag_list( '', ',' );
if ( $tags_list ):
?>
<?php printf( __( '<span class="%1$s">Tagged:%2$s</span>', 'twentyten' ), 'entry-tag', $tags_list ); ?>
<?php endif; ?>
</div>
</header>
<div class="entry-content">
<?php the_content(); ?>
<?php wp_link_pages( array( 'before' => '<div class="entry-readmore">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
</div>
</article>
<?php comments_template( '', true ); ?>
<?php endwhile; // end of the loop. ?>