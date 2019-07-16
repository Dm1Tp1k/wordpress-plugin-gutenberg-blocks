<?php if (!defined('ABSPATH')) exit;

class SafervpnWidgetsShowroom {

    const SCRIPT_NAME = 'safervpn-block-widgets-showroom';

    /**
     * Render html
     *
     * @param array $attributes
     * @return string
     */
    public static function renderCallback($attributes) {
        // TODO: need to improve this
        ob_start();
        require('widgets-showroom.tpl.php');
        return ob_get_clean();
    }


    public static function init()
    {
        wp_register_script(
            self::SCRIPT_NAME,
            plugins_url( 'widgets-showroom.admin.js', __FILE__ ),
            array( 'wp-blocks', 'wp-editor', 'wp-element', 'wp-data', 'wp-components' )
        );

        register_block_type('safervpn/widgets-showroom', array(
            'editor_script' => self::SCRIPT_NAME,
            'render_callback' => array(get_class() , 'renderCallback'),
            'attributes' => [
                'widgetInputAttr' => [
                    'default' => 'default input value',
                    'type'    => 'string'
                ],
                'widgetTextareaAttr' => [
                    'default' => 'default textarea value',
                    'type'    => 'string'
                ],
                'widgetImageAttr' => [
                    'default' => '',
                    'type'    => 'string'
                ],
                'widgetSelectAttr' => [
                    'default' => 'opt-one',
                    'type'    => 'string'
                ],
                'widgetColorAttr' => [
                    'default' => '#F00',
                    'type'    => 'string'
                ],
                'widgetItemsAttr' => [
                    'default' => [],
                    'type' => 'object'
                ],
            ]
        ));
    }
}

add_action('init', array('SafervpnWidgetsShowroom', 'init'), 11);