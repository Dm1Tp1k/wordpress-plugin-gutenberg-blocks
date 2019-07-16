<?php if (!defined('ABSPATH')) exit;

class SafervpnPartnersBestVpn {

    const SCRIPT_NAME = 'safervpn-block-partners-best-vpn';

    /**
     * Render html
     *
     * @param array $attributes
     * @return string
     */
    public static function renderCallback($attributes) {
        // TODO: need to improve this
        ob_start();
        require('partners-best-vpn.tpl.php');
        return ob_get_clean();
    }


    public static function init()
    {
        wp_register_script(
            self::SCRIPT_NAME,
            plugins_url( 'partners-best-vpn.admin.js', __FILE__ ),
            array( 'wp-blocks', 'wp-editor', 'wp-element', 'wp-data', 'wp-components' )
        );

        register_block_type('safervpn/partners-best-vpn', array(
            'editor_script' => self::SCRIPT_NAME,
            'render_callback' => array(get_class() , 'renderCallback'),
            'attributes' => []
        ));
    }
}

add_action('init', array('SafervpnPartnersBestVpn', 'init'), 11);