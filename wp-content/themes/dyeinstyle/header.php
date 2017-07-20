<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dye_in_Style
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<div class="fixed">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'dyeinstyle' ); ?></a>
		<div class="info">
			<div class="social-top">
				<a href="https://www.facebook.com/pg/mariasdyeinstyle"><i class="fa fa-facebook" aria-hidden="true"></i></a>
				<a href="https://www.instagram.com/explore/locations/330212585/marias-dye-in-style/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
			</div>
			<div class="contact-info">
				<span><i class="fa fa-phone" aria-hidden="true"></i> 215.781.6450</span> <a href="get.mndbdy.ly/s1ud/7ZaMvFfNBr"><button class="appointment"><i class="fa fa-calendar" aria-hidden="true"></i> BOOK APPOINTMENT</button></a>
			</div>
		</div>
		<header id="masthead" class="site-header">
			<div class="site-branding">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			</div><!-- .site-branding -->
	
			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars" aria-hidden="true"></i> <?php esc_html_e( 'Menu', 'dyeinstyle' ); ?></button>
				<?php
					wp_nav_menu( array(
						'theme_location' => 'main-nav',
						'menu_id'        => 'primary-menu',
					) );
				?>
			</nav><!-- #site-navigation -->
		</header><!-- #masthead -->
	</div><!-- .fixed -->	
	
	<?php if ( is_front_page() ) { ?>
	<div class="header-image-front">	
		<?php the_header_image_tag(); ?>
		<div class="logo-description">
			<div class="custom-logo-home">
				<?php the_custom_logo();?>
			</div><!-- .custom-logo -->		
				<?php $description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
						<div class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></div>
				<?php
				endif; ?>
			
		</div><!-- .logo-desription -->	
	</div><!-- .header-image -->
	
	<?php } elseif (is_home() ) { ?>
	<div class="header-image">	
		<?php the_header_image_tag(); ?>
		<div class="logo-description">
			<div class="custom-logo">
				<?php the_custom_logo(); ?>
			</div><!-- .custom-logo -->		
			<div class="site-heading">
				<h1>News &amp; Info</h1>
			</div><!-- .site-heading -->
		</div><!-- .logo-desription -->	
	</div><!-- .header-image -->
	
	<?php } else { ?>
	<div class="header-image">	
		<?php if (has_post_thumbnail() ) {
			the_post_thumbnail(); 
		} else {
			the_header_image_tag();
		} ?>
		<div class="logo-description">
			<div class="custom-logo">
				<?php the_custom_logo(); ?>
			</div><!-- .custom-logo -->		
				<?php $title = the_title( '<div class="site-heading"><h1>', '</h1></div>' );
					echo $title; /* WPCS: xss ok. */
				?>
		</div><!-- .logo-desription -->		
	</div><!-- .header-image -->
	<?php } ?>
		
		

	<div class="divider"></div>
	<div id="content" class="content-container">
