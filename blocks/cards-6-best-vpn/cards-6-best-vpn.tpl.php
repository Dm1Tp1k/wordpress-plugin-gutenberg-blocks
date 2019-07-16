<!-- Widgets showroom -->

<!-- TODO: This is tmp solution. Need to inline css for prod and link for dev -->
<link rel="stylesheet" type="text/css" href="<?php echo home_url('public/css/' . self::SCRIPT_NAME) ?>.css">

<section class="container cards-6-best-vpn">
	<div class="cards-6-best-vpn__inner">
		<?php foreach($attributes['cards']['values'] as $item): ?>
			<div class="cards-6-best-vpn__card">
				<img class="cards-6-best-vpn__icon" src="<?php echo $item['icon'] ?>">
				<div class="cards-6-best-vpn__header">
                    <?php echo $item['title'] ?>
				</div>
				<div class="cards-6-best-vpn__description">
                    <?php echo $item['text'] ?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</section>