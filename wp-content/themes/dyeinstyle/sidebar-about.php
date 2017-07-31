<?php
/**
 * The sidebar containing the main widget area for the about page
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dye_in_Style
 */

if ( ! is_active_sidebar( 'about-1' ) ) {
	return;
}
?>

<aside id="about-sidebar" class="widget-area">
	<?php dynamic_sidebar( 'about-1' ); ?>
</aside><!-- #secondary -->
