<?php if (!defined('ABSPATH')) exit;

class SafervpnHeaderSubheader {

    const SCRIPT_NAME = 'safervpn-block-header-subheader';

    /**
     * Render html
     *
     * @param array $attributes
     * @return string
     */
    public static function renderCallback($attributes) {
        // TODO: need to improve this
        ob_start();
        require('header-subheader.tpl.php');
        return ob_get_clean();
    }


    public static function init()
    {
        wp_register_script(
            self::SCRIPT_NAME,
            plugins_url( 'header-subheader.admin.js', __FILE__ ),
            array( 'wp-blocks', 'wp-editor', 'wp-element', 'wp-data', 'wp-components' )
        );

        register_block_type('safervpn/header-subheader', array(
            'editor_script' => self::SCRIPT_NAME,
            'render_callback' => array(get_class() , 'renderCallback'),
            'attributes' => [
                'header' => [
                    'default' => 'Input header',
                    'type'    => 'string'
                ],
                'subheader' => [
                    'default' => 'Input subheader',
                    'type'    => 'string'
                ],
            ]
        ));
    }
}

add_action('init', array('SafervpnHeaderSubheader', 'init'), 11);