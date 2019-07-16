<?php if (!defined('ABSPATH')) exit;

class SafervpnTrustPilotBestVpn {

    const SCRIPT_NAME = 'safervpn-block-trustpilot-best-vpn';

    /**
     * Render html
     *
     * @param array $attributes
     * @return string
     */
    public static function renderCallback($attributes) {
        // TODO: need to improve this
        ob_start();
        require('trustpilot-best-vpn.tpl.php');
        return ob_get_clean();
    }


    public static function init()
    {
        wp_register_script(
            self::SCRIPT_NAME,
            plugins_url( 'trustpilot-best-vpn.admin.js', __FILE__ ),
            array( 'wp-blocks', 'wp-editor', 'wp-element', 'wp-data', 'wp-components' )
        );

        register_block_type('safervpn/trustpilot-best-vpn', array(
            'editor_script' => self::SCRIPT_NAME,
            'render_callback' => array(get_class() , 'renderCallback'),
            'attributes' => []
        ));
    }
}

add_action('init', array('SafervpnTrustPilotBestVpn', 'init'), 11);