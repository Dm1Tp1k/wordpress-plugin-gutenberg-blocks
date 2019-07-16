<?php if (!defined('ABSPATH')) exit;

class SafervpnRiskFreeBestVpn {

    const SCRIPT_NAME = 'safervpn-block-riskfree-best-vpn';

    /**
     * Render html
     *
     * @param array $attributes
     * @return string
     */
    public static function renderCallback($attributes) {
        // TODO: need to improve this
        ob_start();
        require('riskfree-best-vpn.tpl.php');
        return ob_get_clean();
    }


    public static function init()
    {
        wp_register_script(
            self::SCRIPT_NAME,
            plugins_url( 'riskfree-best-vpn.admin.js', __FILE__ ),
            array( 'wp-blocks', 'wp-editor', 'wp-element', 'wp-data', 'wp-components' )
        );

        register_block_type('safervpn/riskfree-best-vpn', array(
            'editor_script' => self::SCRIPT_NAME,
            'render_callback' => array(get_class() , 'renderCallback'),
            'attributes' => [
                'header' => [
                    'default' => '100% Risk Free Money-Back Guarantee', 
                    'type' => 'string'
                ],
                'subheader' => [
                    'default' => 'If you\'re not 100% satisfied with SaferVPN, we\'ll refund your payment. No hassle, no risk.', 
                    'type'  => 'string'
                ],
            ]
        ));
    }
}

add_action('init', array('SafervpnRiskFreeBestVpn', 'init'), 11);
