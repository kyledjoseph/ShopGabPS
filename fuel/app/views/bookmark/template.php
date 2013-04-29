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
	<link rel="stylesheet" href="/assets/css/bookmark/style.css?cb=<? echo rand(); ?>">
	<?= Asset::css('bootstrap.css') ?>

  </head>
  <body>
	<div class="itemnation-box">

		<img class="image" src="/assets/img/bookmark/logo.png" />

		<?php if (isset($notice)): ?>

		<br><br>
		<div class="alert alert-<?= $notice->type ?>">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?= $notice->message ?>
		</div>

		<?php endif; ?>

		<?= isset($body) ? $body : null ?>
	</div>
  </body>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="/assets/js/bookmark/child.js?cb=<? echo rand(); ?>"></script>
  <?= View::forge('analytics/bookmark') ?>

  	<?= Asset::js('bootstrap/bootstrap.js') ?>
	<?= Asset::js('bootstrap/bootstrap-alert.js') ?>
	

</html>