<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 * @package WordPress
 * @subpackage Yeeh
 * @since yeeh 1.0.1
 */
?>

<?php /* Display navigation to next/previous pages when applicable */ ?>

<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
<article class="post" role="article">
<header class="entry-header">
<h2 class="entry-title"><?php _e( 'Not Found', 'twentyten' ); ?></h2>
</header>
<div class="entry-content">
<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyten' ); ?></p>
</div>
</article>
<?php endif; ?>
<?php /* Start the Loop.*/ ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php /* How to display posts of the Gallery format. The gallery category is the old way. */ ?>
<?php if ( ( function_exists( 'get_post_format' ) && 'gallery' == get_post_format( $post->ID ) ) || in_category( _x( 'gallery', 'gallery category slug', 'twentyten' ) ) ) : ?>
<article class="post" role="article">
<header class="entry-header">
<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
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
<?php if ( post_password_required() ) : ?>
<?php the_content(); ?>
<?php else : ?>
				<?php
					$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
					if ( $images ) :
						$total_images = count( $images );
						$image = array_shift( $images );
						$image_img_tag = wp_get_attachment_image( $image->ID, 'thumbnail' );
				?>
						<div class="entry-thumb">
							<a class="entry-thumbsize" href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>
						</div><!-- .gallery-thumb -->
						<p><em><?php printf( _n( 'This gallery contains <a %1$s>%2$s photo</a>.', 'This gallery contains <a %1$s>%2$s photos</a>.', $total_images, 'twentyten' ),
								'href="' . get_permalink() . '" title="' . sprintf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark"',
								number_format_i18n( $total_images )
							); ?></em></p>
				<?php endif; ?>
						<?php the_excerpt(); ?>
<?php endif; ?>
</div>
</article>
<?php /* How to display posts of the Aside format. The asides category is the old way. */ ?>
<?php elseif ( ( function_exists( 'get_post_format' ) && 'aside' == get_post_format( $post->ID ) ) || in_category( _x( 'asides', 'asides category slug', 'twentyten' ) )  ) : ?>
<article class="post" role="article">
<?php if ( is_archive() || is_search() ) : // Display excerpts for archives and search. ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div>
<?php else : ?>
			<div class="entry-content">
				<?php the_content( __( 'Continue reading &rarr;', 'twentyten' ) ); ?>
			</div>
<?php endif; ?>
<footer class="entry-utility">
<div class="entry-meta">
<?php printf( __( '<span class="entry-author">By %1$s </span>', 'twentyten' ),
		sprintf( '<a href="%1$s" title="%2$s">%3$s</a>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'twentyten' ), get_the_author() ) ),
			get_the_author()
		)
	); ?>
<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="entry-edit">', '</span>' ); ?>
<span class="entry-comment"><?php comments_popup_link( __( 'Leave a comment', 'twentyten' ), __( '1 Comment', 'twentyten' ), __( '% Comments', 'twentyten' ) ); ?></span>
</div>
</footer>
</article>
<?php /* How to display all other posts. */ ?>
<?php else : ?>
<article class="post" role="article">
<header class="entry-header">
<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
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
	<?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div>
	<?php else : ?>
			<div class="entry-content">
				<?php the_content( __( 'Continue reading &rarr;', 'twentyten' ) ); ?>
				<?php wp_link_pages( array( 'before' => '<div class="entry-readmore">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
			</div>
	<?php endif; ?>
</article>
<?php endif; // This was the if statement that broke the loop into three parts based on categories. ?>
<?php endwhile; // End the loop. Whew. ?>
<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
<footer class="pager">
<span class="pager-prev"><?php next_posts_link( __( '&larr; Older Post', 'yeeh' ) ); ?></span>
<span class="pager-next"><?php previous_posts_link( __( 'Newer Post &rarr;', 'yeeh' ) ); ?></span>
</footer>
<?php endif; ?>
