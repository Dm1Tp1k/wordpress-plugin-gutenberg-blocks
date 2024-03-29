<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit253c4410ed2e68fe0ee46c5c8977b53a
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Safervpn\\Inc\\' => 13,
            'Safervpn\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Safervpn\\Inc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
        'Safervpn\\' => 
        array (
            0 => __DIR__ . '/../..' . '/blocks',
        ),
    );

    public static $classMap = array (
        'Safervpn\\Inc\\Pricing\\Manager' => __DIR__ . '/../..' . '/inc/Pricing/Manager.php',
        'Safervpn\\Inc\\Pricing\\PricesProvider' => __DIR__ . '/../..' . '/inc/Pricing/PricesProvider.php',
        'Safervpn\\Inc\\Pricing\\PricingItem' => __DIR__ . '/../..' . '/inc/Pricing/PricingItem.php',
        'Safervpn\\Inc\\PublicIPInfo' => __DIR__ . '/../..' . '/inc/PublicIPinfo/PublicIPinfo.php',
        'Safervpn\\Inc\\Registerscripts\\SaferVpn' => __DIR__ . '/../..' . '/inc/styles.php',
        'Safervpn\\Inc\\SaferVpnAPIClient' => __DIR__ . '/../..' . '/inc/PublicIPinfo/SaferVpnAPIClient.php',
        'Safervpn\\SafervpnCardsBestVpn\\SafervpnCardsBestVpn' => __DIR__ . '/../..' . '/blocks/cards-6-best-vpn/cards-6-best-vpn.php',
        'Safervpn\\SafervpnHeaderSubheader\\SafervpnHeaderSubheader' => __DIR__ . '/../..' . '/blocks/header-subheader/header-subheader.php',
        'Safervpn\\SafervpnIBlockBestVpn\\SafervpnIBlockBestVpn' => __DIR__ . '/../..' . '/blocks/iblock-best-vpn/iblock-best-vpn.php',
        'Safervpn\\SafervpnIntroBestVpn\\SafervpnIntroBestVpn' => __DIR__ . '/../..' . '/blocks/intro-best-vpn/intro-best-vpn.php',
        'Safervpn\\SafervpnMenuBestVpn\\SafervpnMenuBestVpn' => __DIR__ . '/../..' . '/blocks/menu-best-vpn/menu-best-vpn.php',
        'Safervpn\\SafervpnPartnersBestVpn\\SafervpnPartnersBestVpn' => __DIR__ . '/../..' . '/blocks/partners-best-vpn/partners-best-vpn.php',
        'Safervpn\\SafervpnPricingCardsBestVpn\\SafervpnPricingCardsBestVpn' => __DIR__ . '/../..' . '/blocks/pricing-cards-best-vpn/pricing-cards-best-vpn.php',
        'Safervpn\\SafervpnRiskFreeBestVpn\\SafervpnRiskFreeBestVpn' => __DIR__ . '/../..' . '/blocks/riskfree-best-vpn/riskfree-best-vpn.php',
        'Safervpn\\SafervpnSliderBestVpn\\SafervpnSliderBestVpn' => __DIR__ . '/../..' . '/blocks/slider-best-vpn/slider-best-vpn.php',
        'Safervpn\\SafervpnSplit\\SafervpnSplit' => __DIR__ . '/../..' . '/blocks/split/split.php',
        'Safervpn\\SafervpnTrustPilotBestVpn\\SafervpnTrustPilotBestVpn' => __DIR__ . '/../..' . '/blocks/trustpilot-best-vpn/trustpilot-best-vpn.php',
        'Safervpn\\SafervpnWidgetsShowroom\\SafervpnWidgetsShowroom' => __DIR__ . '/../..' . '/blocks/widgets-showroom/widgets-showroom.php',
        'Safervpn\\SafervpnWidgetsStatusBar\\SafervpnWidgetsStatusBar' => __DIR__ . '/../..' . '/blocks/widgets-statusbar/widgets-statusbar.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit253c4410ed2e68fe0ee46c5c8977b53a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit253c4410ed2e68fe0ee46c5c8977b53a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit253c4410ed2e68fe0ee46c5c8977b53a::$classMap;

        }, null, ClassLoader::class);
    }
}
