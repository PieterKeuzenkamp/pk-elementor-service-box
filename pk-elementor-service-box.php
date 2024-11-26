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

function register_pk_service_box() {
    require_once(__DIR__ . '/widgets/pk-service-box.php');
    \Elementor\Plugin::instance()->widgets_manager->register(new PK_Service_Box_Widget());
}
add_action('elementor/widgets/register', 'register_pk_service_box');

// Laad CSS bestand
function pk_service_box_styles() {
    wp_enqueue_style('pk-service-box', plugins_url('assets/style.css', __FILE__));
}
add_action('wp_enqueue_scripts', 'pk_service_box_styles');
