<!-- TODO: This is tmp solution. Need to inline css for prod and link for dev -->
<link rel="stylesheet" type="text/css" href="<?php echo home_url('public/css/' . self::SCRIPT_NAME) ?>.css">

<section class="container riskfree-best-vpn">
	<div class="riskfree-best-vpn__icon">
		<img src="https://static.safervpn.com/website20/images/landing/lp-pricing/lp-money-back-guarantee/icon__label.svg">
	</div>
	<div class="riskfree-best-vpn__description">
		<div class="riskfree-best-vpn__header">
			<? echo $attributes['header'] ?>
		</div>
		<div class="riskfree-best-vpn__text">
		<? echo $attributes['subheader'] ?>
		</div>
	</div>
</section>
