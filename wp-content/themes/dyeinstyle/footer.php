<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dye_in_Style
 */

?>

	</div><!-- #content -->
	<div class="divider-footer"></div>
	<footer id="colophon" class="site-footer">
		<div class="footer-container">
			<div class="footer-logo">
				<?php the_custom_logo(); ?>
				<p>125 Mill Street</p>
				<p>Bristol, Pennsylvania</p>
				<p><i class="fa fa-phone" aria-hidden="true"></i> 215.781.6450</p>
			</div>
			<div class="footer-social">
				<h2>Find us on:</h2>
				<?php
					wp_nav_menu( array(
						'theme_location' => 'social',
					) );
				?>
				<a href="https://clients.mindbodyonline.com/LoginLaunch?studioid=283257"><button class="appointment-footer"><i class="fa fa-calendar" aria-hidden="true"></i> BOOK APPOINTMENT</button></a>
			</div>	
			<div class="hours">
				<?php get_sidebar( 'footer-hours'); ?>
			</div>
		</div>	
	</footer><!-- #colophon -->
	<div class="site-info">
		<p>Website design by <a href="http://www.stacylauren.com">Stacy Lauren Designs</a> &copy; <?php echo date(" Y"); ?> Copyright Maria&rsquo;s Dye in Style.</p>
		<p>Website not viewing properly? You may need to upgrade your <a href="http://whatbrowser.org/">browser</a>. This site is best viewed in a <a href="http://browsehappy.com/">modern browser</a>.</p>	
		</div><!-- .site-info -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
