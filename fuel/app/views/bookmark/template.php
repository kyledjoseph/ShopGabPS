<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>Pull-In Button</title>
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	<?php //Asset::css('bootstrap.css') ?>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="/assets/js/bookmark/child.js?cb=<?= isset($last_modified) ? $last_modified : time() ?>"></script>

</head>
<body class="bookmarklet">
	<div class="itemnation-box">
		<div class="bg">
			<div>
				<img class="image" src="/assets/img/logo1.png" />
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

	</div>

	<?= View::forge('analytics/bookmark') ?>
  	<?= Asset::js('bootstrap/bootstrap.min.js') ?>
</body>
</html>