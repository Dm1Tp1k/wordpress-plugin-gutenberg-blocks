<?php if (!defined('ABSPATH')) exit;
/*
Plugin Name: SaferVPN
Version: 0.9.0
*/

function safervpn_admin_scripts() {
    wp_enqueue_media();
    wp_enqueue_script(
        'safervpn-admin-scripts',
        plugins_url('admin-js/editor-constructor.js', __FILE__),
        array('wp-editor', 'wp-element', 'wp-components')
    );
}
add_action('init', 'safervpn_admin_scripts', 9);

require_once('blocks/widgets-showroom/widgets-showroom.php');
require_once('blocks/iblock-best-vpn/iblock-best-vpn.php');
require_once('blocks/header-subheader/header-subheader.php');
require_once('blocks/intro-best-vpn/intro-best-vpn.php');
require_once('blocks/menu-best-vpn/menu-best-vpn.php');
require_once('blocks/cards-6-best-vpn/cards-6-best-vpn.php');
require_once('blocks/pricing-cards-best-vpn/pricing-cards-best-vpn.php');
require_once('blocks/trustpilot-best-vpn/trustpilot-best-vpn.php');
require_once('blocks/partners-best-vpn/partners-best-vpn.php');
require_once('blocks/slider-best-vpn/slider-best-vpn.php');
require_once('blocks/riskfree-best-vpn/riskfree-best-vpn.php');
