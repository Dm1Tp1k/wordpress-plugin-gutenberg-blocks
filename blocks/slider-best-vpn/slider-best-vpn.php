<?php if (!defined('ABSPATH')) exit;

class SafervpnSliderBestVpn {

    const SCRIPT_NAME = 'safervpn-block-slider-best-vpn';

    /**
     * Render html
     *
     * @param array $attributes
     * @return string
     */
    public static function renderCallback($attributes) {
        // TODO: need to improve this
        ob_start();
        require('slider-best-vpn.tpl.php');
        return ob_get_clean();
    }


    public static function init()
    {
        wp_register_script(
            self::SCRIPT_NAME,
            plugins_url( 'slider-best-vpn.admin.js', __FILE__ ),
            array( 'wp-blocks', 'wp-editor', 'wp-element', 'wp-data', 'wp-components' )
        );

        register_block_type('safervpn/slider-best-vpn', array(
            'editor_script' => self::SCRIPT_NAME,
            'render_callback' => array(get_class() , 'renderCallback'),
            'attributes' => [
                'icon1' => ['default' => '', 'type'    => 'string'],
                'years1' => ['default' => '3 Years', 'type'    => 'string'],
                'price1' => ['default' => '2.50', 'type'  => 'string'],

                'icon2' => ['default' => '', 'type'    => 'string'],
                'years2' => ['default' => '2 Years', 'type'    => 'string'],
                'price2' => ['default' => '3.29', 'type'  => 'string'],


                'icon3' => ['default' => '', 'type'    => 'string'],
                'years3' => ['default' => '1 Year', 'type'    => 'string'],
                'price3' => ['default' => ' 5.49', 'type'  => 'string'],
            ]
        ));
    }
}

add_action('init', array('SafervpnSliderBestVpn', 'init'), 11);