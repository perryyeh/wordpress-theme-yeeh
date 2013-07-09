<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Yeeh
 * @since yeeh 1.0
 */
?>
</section>
<footer class="footer">
&copy; <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>. Designed by <?php do_action( 'twentyten_credits' ); ?><a class="yeeh" href="<?php echo esc_url( __( 'http://yeeh.org/', 'yeeh' ) ); ?>" title="<?php esc_attr_e( 'Yeeh', 'yeeh' ); ?>" rel="generator">Yeeh</a>.
</footer>
<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */
	wp_footer();
?>
</body>
</html>