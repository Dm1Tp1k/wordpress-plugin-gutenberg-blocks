<?php if (!defined('ABSPATH')) exit;

class SafervpnCards6BestVpn {

    const SCRIPT_NAME = 'safervpn-block-cards-6-best-vpn';

    /**
     * Render html
     *
     * @param array $attributes
     * @return string
     */
    public static function renderCallback($attributes) {
        // TODO: need to improve this
        ob_start();
        require('cards-6-best-vpn.tpl.php');
        return ob_get_clean();
    }


    public static function init()
    {
        wp_register_script(
            self::SCRIPT_NAME,
            plugins_url( 'cards-6-best-vpn.admin.js', __FILE__ ),
            array( 'wp-blocks', 'wp-editor', 'wp-element', 'wp-data', 'wp-components' )
        );

        register_block_type('safervpn/cards-6-best-vpn', array(
            'editor_script' => self::SCRIPT_NAME,
            'render_callback' => array(get_class() , 'renderCallback'),
            'attributes' => [
                'cards' => ['default' => [], 'type' => 'object'],
            ]
        ));
    }
}

add_action('init', array('SafervpnCards6BestVpn', 'init'), 11);