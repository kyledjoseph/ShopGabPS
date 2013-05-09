<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>Pull-In Button</title>
	<link rel="stylesheet" href="/assets/css/bookmark/style.css?cb=<? echo rand(); ?>">
	<?php //Asset::css('bootstrap.css') ?>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="/assets/js/bookmark/child.js?cb=<? echo rand(); ?>"></script>

</head>
<body>
	<div class="itemnation-box">

		<div>
			<img class="image" src="/assets/img/bookmark/logo.png" />
		</div>
		
		<?php if (isset($notice)): ?>

		<br><br>
		<div class="alert alert-<?= $notice->type ?>">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?= $notice->message ?>
		</div>

		<?php endif; ?>

		<?= isset($body) ? $body : null ?>
	</div>

	<?= View::forge('analytics/bookmark') ?>
  	<?= Asset::js('bootstrap/bootstrap.js') ?>
	<?= Asset::js('bootstrap/bootstrap-alert.js') ?>
</body>
</html>