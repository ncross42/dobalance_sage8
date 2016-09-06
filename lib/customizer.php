<?php

namespace Roots\Sage\Customizer;

use Roots\Sage\Assets;

/**
 * Add postMessage support
 */
function customize_register($wp_customize) {
  $wp_customize->get_setting('blogname')->transport = 'postMessage';

  /* Theme section panel */
  $default_url_setting = array( 'default'=>'', 'sanitize_callback'=>'esc_url_raw' );
  $wp_customize->add_panel ( 'dobalance_theme_options', array(
    'title'=> __( 'Theme Settings', 'dobalance' ),
    'priority' => 10
  ));
  /* Social Network  section*/	
  $wp_customize->add_section( 'dobalance_social_networks', array(
    'panel' => 'dobalance_theme_options',
    'title'    =>__( 'Social Networks', 'dobalance' ),
    'description' => __('Social Networks links', 'dobalance'),
    'priority' => 10,
  ));

  $wp_customize->add_setting ( 'dobalance_facebook_link', $default_url_setting	);
  $wp_customize->add_control ( 'dobalance_facebook_link', array(
    'section' => 'dobalance_social_networks',
    'label' => __('Facebook link','dobalance'),
    'type' => 'text',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_setting ( 'dobalance_twitter_link', $default_url_setting	);
  $wp_customize->add_control ( 'dobalance_twitter_link', array(
    'section' => 'dobalance_social_networks',
    'label' => __('Twitter link', 'dobalance'),
    'sanitize_callback' => 'esc_url_raw',
    'type' => 'text'
  ));
  $wp_customize->add_setting ( 'dobalance_instagram_link', $default_url_setting	);
  $wp_customize->add_control ( 'dobalance_instagram_link', array(
    'section' => 'dobalance_social_networks',
    'label' => __('Instagram link', 'dobalance'),
    'type' => 'text',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_setting ( 'dobalance_youtube_link', $default_url_setting	);
  $wp_customize->add_control ( 'dobalance_youtube_link', array(
    'section' => 'dobalance_social_networks',
    'label' => __('Youtube link','dobalance'),
    'sanitize_callback' => 'esc_url_raw',
    'type' => 'text'
  ));
  $wp_customize->add_setting ( 'dobalance_google_plus_link', $default_url_setting	);
  $wp_customize->add_control ( 'dobalance_google_plus_link', array(
    'section' => 'dobalance_social_networks',
    'label' => __('Gogle Plus link','dobalance'),
    'sanitize_callback' => 'esc_url_raw',
    'type' => 'text'
  ));
  $wp_customize->add_setting ( 'dobalance_rss_link', $default_url_setting	);
  $wp_customize->add_control ( 'dobalance_rss_link', array(
    'section' => 'dobalance_social_networks',
    'label' => __('Rss link','dobalance'),
    'sanitize_callback' => 'esc_url_raw',
    'type' => 'text'
  ));
}
add_action('customize_register', __NAMESPACE__ . '\\customize_register');

/**
 * Customizer JS
 */
function customize_preview_js() {
  wp_enqueue_script('sage/customizer', Assets\asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
}
add_action('customize_preview_init', __NAMESPACE__ . '\\customize_preview_js');

/**
 * Sets up the WordPress core custom header and custom background features.
 *
 * @since Twenty Sixteen 1.0
 *
 * @see twentysixteen_header_style()
 */
function dobalance_custom_header() {
	/**
	 * Filter the arguments used when adding 'custom-header' support in Twenty Sixteen.
	 *
	 * @since Twenty Sixteen 1.0
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type string $default-text-color Default color of the header text.
	 *     @type int      $width            Width in pixels of the custom header image. Default 1200.
	 *     @type int      $height           Height in pixels of the custom header image. Default 280.
	 *     @type bool     $flex-height      Whether to allow flexible-height header images. Default true.
	 *     @type callable $wp-head-callback Callback function used to style the header image and text
	 *                                      displayed on the blog.
	 * }
	 */
	add_theme_support( 'custom-header', array(
		//'default-text-color'     => $default_text_color,
		'width'                  => 1200,
		'height'                 => 300,
		'flex-height'            => true,
    //'wp-head-callback'       => 'dobalance_header_style',
	) );
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\\dobalance_custom_header' );


