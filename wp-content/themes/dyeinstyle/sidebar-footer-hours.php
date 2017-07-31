<?php
/**
 * The sidebar containing the hours widget area for the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dye_in_Style
 */

if ( ! is_active_sidebar( 'footer-hours' ) ) {
	return;
}
?>


<?php dynamic_sidebar( 'footer-hours' ); ?>
