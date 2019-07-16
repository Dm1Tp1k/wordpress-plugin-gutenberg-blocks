<?php if (!defined('ABSPATH')) exit;

class SafervpnIBlockBestVpn {

    const SCRIPT_NAME = 'safervpn-block-iblock-best-vpn';

    /**
     * Render html
     *
     * @param array $attributes
     * @return string
     */
    public static function renderCallback($attributes) {
        // TODO: need to improve this
        ob_start();
        require('iblock-best-vpn.tpl.php');
        return ob_get_clean();
    }


    public static function init()
    {
        wp_register_script(
            self::SCRIPT_NAME,
            plugins_url( 'iblock-best-vpn.admin.js', __FILE__ ),
            array( 'wp-blocks', 'wp-editor', 'wp-element', 'wp-data', 'wp-components' )
        );

        register_block_type('safervpn/iblock-best-vpn', array(
            'editor_script' => self::SCRIPT_NAME,
            'render_callback' => array(get_class() , 'renderCallback'),
            'attributes' => [
                'title' => [
                    'default' => 'Lightning speed & multiple protocols',
                    'type'    => 'string'
                ],
                'text' => [
                    'default' => 'With custom-coded servers and multiple protocols, you’ll get the highest speeds possible from any location you choose. Our VPN Software runs so fast, you won\'t even notice it\'s there.',
                    'type'    => 'string'
                ],
                'imageSideSelector' => [
                    'default' => 'right',
                    'type'    => 'string'
                ],
                'picture' => [
                    'default' => '',
                    'type'    => 'string'
                ],
                'picture2x' => [
                    'default' => '',
                    'type'    => 'string'
                ],
                'picture3x' => [
                    'default' => '',
                    'type'    => 'string'
                ],
            ]
        ));
    }
}

add_action('init', array('SafervpnIBlockBestVpn', 'init'), 11);