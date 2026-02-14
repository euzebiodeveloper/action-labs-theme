<?php
/**
 * action-labs-theme Theme Customizer
 *
 * @package action-labs-theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function action_labs_theme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Remove the blog description control (site tagline) from the Customizer.
	$wp_customize->remove_control( 'blogdescription' );

	/* Home action title setting */
	$wp_customize->add_setting( 'home_action_title', array(
		'default'           => 'Portal do cliente',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'home_action_title', array(
		'label'    => __( 'Home action title', 'action-labs-theme' ),
		'section'  => 'title_tagline',
		'settings' => 'home_action_title',
		'type'     => 'text',
	) );


	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'action_labs_theme_customize_partial_blogname',
			)
		);


		/* selective refresh for home action title */
		$wp_customize->selective_refresh->add_partial(
			'home_action_title',
			array(
				'selector'        => '.home-action-title',
				'render_callback' => 'action_labs_theme_customize_partial_home_action_title',
			)
		);


	}
}
add_action( 'customize_register', 'action_labs_theme_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function action_labs_theme_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
// site tagline partial removed (description control hidden)

/**
 * Render the home action title for the selective refresh partial.
 *
 * @return void
 */
function action_labs_theme_customize_partial_home_action_title() {
	echo esc_html( get_theme_mod( 'home_action_title', 'Portal do cliente' ) );
}



/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function action_labs_theme_customize_preview_js() {
	wp_enqueue_script( 'action-labs-theme-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'action_labs_theme_customize_preview_js' );
