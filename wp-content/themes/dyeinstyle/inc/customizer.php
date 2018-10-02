<?php
/**
 * Dye in Style Theme Customizer
 *
 * @package Dye_in_Style
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function dyeinstyle_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'dyeinstyle_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'dyeinstyle_customize_partial_blogdescription',
		) );
	}
	
	// Contact, Social & Appointment Link Section

	$wp_customize->add_section(
        'contact_social_appointment',
        array(
            'title' => __('Contact, Social & Appointment Link', 'vision-lite'),
            'priority' => null,
			'description'	=> __('Add phone number and links for social media and appointment button.','dyeinstyle'),	
        )
    );
    
 	$wp_customize->add_setting('phone',array(
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('phone',array(
			'type'	=> 'text',
			'label'	=> __('Add phone number here.','dyeinstyle'),
			'section'	=> 'contact_social_appointment'
	));   
	
 	$wp_customize->add_setting('street_address',array(
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('street_address',array(
			'type'	=> 'text',
			'label'	=> __('Add street address here.','dyeinstyle'),
			'section'	=> 'contact_social_appointment'
	));  
	
 	$wp_customize->add_setting('city_state_zip',array(
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('city_state_zip',array(
			'type'	=> 'text',
			'label'	=> __('Add city, state and zip here.','dyeinstyle'),
			'section'	=> 'contact_social_appointment'
	)); 	
	
	$wp_customize->add_setting('email',array(
			'default' => null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('email',array(
			'type'	=> 'text',
			'label'	=> __('Add email here.','dyeinstyle'),
			'section'	=> 'contact_social_appointment'
	));	 	
    
	$wp_customize->add_setting('facebook_link',array(
			'default' => null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('facebook_link',array(
			'type'	=> 'text',
			'label'	=> __('Add Facebook link here.','dyeinstyle'),
			'section'	=> 'contact_social_appointment'
	));	 
	
	$wp_customize->add_setting('ig_link',array(
			'default' => null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('ig_link',array(
			'type'	=> 'text',
			'label'	=> __('Add Instagram link here.','dyeinstyle'),
			'section'	=> 'contact_social_appointment'
	));	 
	
	$wp_customize->add_setting('twitter_link',array(
			'default' => null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('twitter_link',array(
			'type'	=> 'text',
			'label'	=> __('Add Twitter link here.','dyeinstyle'),
			'section'	=> 'contact_social_appointment'
	));		
	
	$wp_customize->add_setting('appointment_link',array(
			'default' => null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('appointment_link',array(
			'type'	=> 'text',
			'label'	=> __('Add appointment link here.','dyeinstyle'),
			'section'	=> 'contact_social_appointment'
	));		
	
}

add_action( 'customize_register', 'dyeinstyle_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function dyeinstyle_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function dyeinstyle_customize_partial_blogdescription() {
	bloginfo( 'description' );
}


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function dyeinstyle_customize_preview_js() {
	wp_enqueue_script( 'dyeinstyle_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'dyeinstyle_customize_preview_js' );
