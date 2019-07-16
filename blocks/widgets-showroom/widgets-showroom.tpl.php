<!-- Widgets showroom -->

<!-- TODO: This is tmp solution. Need to inline css for prod and link for dev -->
<link rel="stylesheet" type="text/css" href="<?php echo home_url('public/css/' . self::SCRIPT_NAME) ?>.css">

<!-- Usage text from input -->
<h1><?php echo $attributes['widgetInputAttr'] ?></h1>

<!-- Usage text from textarea -->
<h3><?php echo $attributes['widgetTextareaAttr'] ?></h3>

<!-- Usage text from dropdown's value -->
<div>
	<strong>Dropdown selected: <?php echo $attributes['widgetSelectAttr'] ?></strong>
</div>

<!-- Usage color from picker -->
<div style="width: 100%; height: 20px;  padding: 20px 0; display: block; color: <?php echo $attributes['widgetColorAttr'] ?>">This is color picker result</div>

<hr>

<!-- Usage image url from wordpress media uploader -->
<div style="display: block;">
	<img src="<?php echo $attributes['widgetImageAttr'] ?>" alt="">
</div>

<div>
	<h4>List of items:</h4>
	<ul>
		<?php foreach($attributes['widgetItemsAttr']['values'] as $item): ?>
			<li><?php echo $item['title'] ?></li>
		<?php endforeach; ?>
	</ul>
</div>
