<?php
/**
 * The sidebar containing the hours widget area for the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dye_in_Style
 */

if ( ! is_active_sidebar( 'header-contact' ) ) {
	return;
}
?>


<?php dynamic_sidebar( 'header-contact' ); ?>
