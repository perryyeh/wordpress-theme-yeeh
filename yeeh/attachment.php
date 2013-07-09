<?php
/**
 * The template for displaying attachments.
 *
 * @package WordPress
 * @subpackage Yeeh
 * @since yeeh 1.0.1
 */

get_header(); ?>
<section class="col-main">
<?php
/* Run the loop to output the attachment.
 * If you want to overload this in a child theme then include a file
 * called loop-attachment.php and that will be used instead.
 */
get_template_part( 'loop', 'attachment' );
?>
</section>
<?php get_footer(); ?>
