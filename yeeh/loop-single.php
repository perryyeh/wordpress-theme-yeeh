<?php
/**
 * The loop that displays a single post.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-single.php.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.2
 */
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<article class="post" role="article">
<header class="entry-header">
<h1 class="entry-title"><?php the_title(); ?></h1>
<div class="entry-meta">
<time class="entry-time" datetime="<?php the_time('c'); ?>" pubdate="pubdate" data-updated="true"><span class="entry-month"><?php the_time('M'); ?></span><span class="entry-year"><?php the_time('Y'); ?></span><span class="entry-day"><?php the_time('d'); ?></span></time>
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
<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
</div>
<footer class="pager">
<span class="pager-prev"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentyten' ) . '</span> %title' ); ?></span>
<span class="pager-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '</span>' ); ?></span>
</footer>
</article>
<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
					<div id="entry-author-info">
						<div id="author-avatar">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyten_author_bio_avatar_size', 60 ) ); ?>
						</div><!-- #author-avatar -->
						<div id="author-description">
							<h2><?php printf( __( 'About %s', 'twentyten' ), get_the_author() ); ?></h2>
							<?php the_author_meta( 'description' ); ?>
							<div id="author-link">
								<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" rel="author">
									<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentyten' ), get_the_author() ); ?>
								</a>
							</div><!-- #author-link	-->
						</div><!-- #author-description -->
					</div><!-- #entry-author-info -->
<?php endif; ?>
<a name="comments"></a><a name="respond"></a>
<?php comments_template( '', true ); ?>
<?php endwhile; // end of the loop. ?>