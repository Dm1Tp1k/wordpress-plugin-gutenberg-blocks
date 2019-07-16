<!-- TODO: This is tmp solution. Need to inline css for prod and link for dev -->
<link rel="stylesheet" type="text/css" href="<?php echo home_url('public/css/' . self::SCRIPT_NAME) ?>.css">

<section class="container header-subheader">
	<div class="header-subheader__header">
		<h2 class="h"><?php echo $attributes['header'] ?></h2>
	</div>
	<div class="header-subheader__subheader">
		<h3 class="h"><?php echo $attributes['subheader'] ?></h3>
	</div>
</section>