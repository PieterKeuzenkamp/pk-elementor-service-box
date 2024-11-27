<?php
/**
 * Plugin Name: PK Elementor Service Box
 * Description: Een custom Elementor widget voor service boxes
 * Version: 1.0.0
 * Author: Pieter Keuzenkamp
 * Company: Pieter Keuzenkamp Websites
 * Author URI: https://www.pieterkeuzenkamp.nl
 * Text Domain: pk-elementor-widgets
 * Requires Elementor: 3.0.0
 * Requires PHP: 7.0
 */

if (!defined('ABSPATH')) {
    exit;
}

// Register Widget
function register_pk_service_box() {
    require_once(__DIR__ . '/widgets/pk-service-box.php');
    \Elementor\Plugin::instance()->widgets_manager->register(new PK_Service_Box_Widget());
}
add_action('elementor/widgets/register', 'register_pk_service_box');

// Register Widget Icon
function add_pk_elementor_widget_categories($elements_manager) {
    $elements_manager->add_category(
        'pk-widgets',
        [
            'title' => __('PK Widgets', 'pk-elementor-widgets'),
            'icon' => 'fa fa-plug',
        ]
    );
}
add_action('elementor/elements/categories_registered', 'add_pk_elementor_widget_categories');

// Register Custom Icon
function register_pk_widget_icon($additional_custom_icons) {
    $additional_custom_icons['pk-widget-icon'] = [
        'url' => plugins_url('assets/widget-icon.svg', __FILE__),
        'path' => plugin_dir_path(__FILE__) . 'assets/widget-icon.svg',
    ];
    return $additional_custom_icons;
}
add_filter('elementor/icons_manager/additional_custom_icons', 'register_pk_widget_icon');

// Laad CSS bestand
function pk_service_box_styles() {
    wp_register_style(
        'pk-service-box',
        plugins_url('assets/style.css', __FILE__),
        [],
        '1.0.0'
    );
    wp_enqueue_style('pk-service-box');
}
add_action('wp_enqueue_scripts', 'pk_service_box_styles');
