<!-- Widgets showroom -->

<!-- TODO: This is tmp solution. Need to inline css for prod and link for dev -->
<link rel="stylesheet" type="text/css" href="<?php echo home_url('public/css/' . self::SCRIPT_NAME) ?>.css">

<section class="container iblock-best-vpn iblock-best-vpn_img-<?php echo $attributes['imageSideSelector'] ?>">
	<div class="iblock-best-vpn__inner">
		<div class="iblock-best-vpn__info">
			<div class="iblock-best-vpn__title-holder">
				<h2 class="h h_monts-b-29-35 h_monts-b-18-23-mobile"><?php echo $attributes['title'] ?></h2>
			</div>
			<div class="iblock-best-vpn__text-holder">
				<p class="p p_monts-20-32 p_monts-13-19-sm p_nls-04-sm"><?php echo $attributes['text'] ?></p>
			</div>
			<div class="iblock-best-vpn__btn-holder">
				<a class="btn btn_alina-tr-blue-medium">Buy Now</a>
			</div>
		</div>
		<div class="iblock-best-vpn__image-holder">
			<picture>
				<source srcset="<?php echo $attributes['picture2x'] ?>, <?php echo $attributes['picture3x'] ?> 2x " media="(min-width: 1600px)">
				<source srcset="<?php echo $attributes['picture'] ?>" media="(max-width: 480px)">
				<img class="iblock-best-vpn__image"alt="Simple apps & easy installation" src="<?php echo $attributes['picture'] ?>" srcset="<?php echo $attributes['picture2x'] ?> 2x">
			</picture>
		</div>
	</div>
</section>