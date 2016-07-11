<?php
/**
 * Rollins Ridge Theme Customizer.
 *
 * @package Rollins_Ridge
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function rr_test_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    $wp_customize->remove_section( 'colors' );

    // Company Information section
    $wp_customize->add_section ( 'company_contact_information', array(
        'title'       => 'Company Information',
        'description' => 'Fill out your company information',
        'priority'    => '1'
    ) );
    // Company name
    $wp_customize->add_setting ( 'setting_name', array(
        'default'           => 'Rollins Ridge Apartments',
        'sanitize_callback' => 'sanitize_text'
    ) );
    $wp_customize->add_control ( 'setting_name', array(
        'label'   => 'Company Name',
        'section' => 'company_contact_information',
        'type'    => 'text'
    ) );
    // Company address
    $wp_customize->add_setting ( 'setting_address', array(
        'sanitize_callback' => 'sanitize_text'
    ) );
    $wp_customize->add_control ( 'setting_address', array(
        'label'   => 'Street Address',
        'section' => 'company_contact_information',
        'type'    => 'text'
    ) );
    // City
    $wp_customize->add_setting ( 'setting_city', array(
            'sanitize_callback' => 'sanitize_text'
        ) );
    $wp_customize->add_control ( 'setting_city', array(
            'label'   => 'City',
            'section' => 'company_contact_information',
            'type'    => 'text'
        ) );
    // State
    $wp_customize->add_setting ( 'setting_state', array(
            'sanitize_callback' => 'sanitize_text'
        ) );
    $wp_customize->add_control ( 'setting_state', array(
            'label'   => 'State',
            'section' => 'company_contact_information',
            'type'    => 'text'
        ) );
    // Company zipcode
    $wp_customize->add_setting ( 'setting_zipcode', array(
            'sanitize_callback' => 'sanitize_text'
        ) );
    $wp_customize->add_control ( 'setting_zipcode', array(
            'label'   => 'Zip Code',
            'section' => 'company_contact_information',
            'type'    => 'text'
        ) );
    // Company phone number
    $wp_customize->add_setting ( 'setting_phone', array(
            'sanitize_callback' => 'sanitize_text'
        ) );
    $wp_customize->add_control ( 'setting_phone', array(
            'label'   => 'Phone Number',
            'section' => 'company_contact_information',
            'type'    => 'text'
        ) );
    // Fax number
    $wp_customize->add_setting ( 'fax_number', array(
            'sanitize_callback' => 'sanitize_text'
        ) );
    $wp_customize->add_control ( 'fax_number', array(
            'label'   => 'Fax Number',
            'section' => 'company_contact_information',
            'type'    => 'text'
        ) );
}
add_action( 'customize_register', 'rr_test_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function rr_test_customize_preview_js() {
	wp_enqueue_script( 'rr_test_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'rr_test_customize_preview_js' );

/**
 * SANITIZE WHAT IS ENTERED
*/

function sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}