<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Yeeh
 * @since yeeh 1.0.1
 */
?>
<aside class="col-sub">
<?php
// homepage widgets
if ( is_home() ) : ?>
<?php if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>
<div class="widget widget_meta">
<h6 class="widget-hd">Meta</h6>
<div class="widget-bd">
<ul>
<?php wp_register(); ?>
<li><?php wp_loginout(); ?></li>
<?php wp_meta(); ?>
</ul>
</div></div>
<?php endif; ?>
<?php endif; ?>
<?php
// otherpage widgets
if ( !is_home() && is_active_sidebar( 'secondary-widget-area' ) ) : ?>
<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
<?php endif; ?>
</aside>