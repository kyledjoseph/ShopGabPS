<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>Pull-In Button</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="<b>This description</b> is <em>full</em> of <strong>HTML</strong>.">
	<?= Asset::css('bookmark/normalize.css') ?>
	<?= Asset::css('bookmark/style.min.css') ?>

</head>
<body>
	<div class="itemnation-box" style="display:none">
		<?= Asset::img('bookmark/left.png', array('class' => 'arrow left')) ?>
		<?= Asset::img('bookmark/right.png', array('class' => 'arrow right')) ?>
		
		<img class="product-image" id="1" class="image" src="http://placehold.it/200x200">
		<div class="gallery">
		</div>
		<input type="text" class="title" placeholder="Product Name" maxlength="50">
		<textarea class="description" placeholder="Description"></textarea>
		<a class="cancel" href="#">Cancel</a>
		<a class="add" href="#">Add To Wishlist</a>
	</div>
</body>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<?= Asset::js('bookmark/child.js') ?>
</html>