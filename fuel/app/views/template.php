<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>ShopGab - Shop social!</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<?= Casset::render_css() ?>
	<!--[if lt IE 9]>
	<script src="../assets/js/html5shiv.js"></script>
	<![endif]-->
</head>

<body>
	<a class="feedback" href="#feedbackModal" data-toggle="modal"><img src="/assets/img/feedback.png" /></a>
	<div class="container">
		<?= $view->header ?>

		<?php if (isset($notice)): ?>
			<div class="alert alert-<?= $notice->type ?>">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<?= $notice->message ?>
			</div>
		<?php endif; ?>

		<?= $body ?>
	</div>

	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="span4 left-footer">
					<h3>Who are we?</h3>
					<ul class="site-links">
						<li><?= Html::anchor('#', 'About Us') // Html::anchor('about', 'About Us') ?></li>
						<li><?= Html::anchor('#', 'Our Team') // Html::anchor('about/team', 'Our Team') ?></li>
						<li><?= Html::anchor('http://shopgab.wordpress.com/', 'ShopGab Blog') ?></li>
						<li><?= Html::anchor('#', 'Contact Us') // Html::anchor('contact', 'Contact Us') ?></li>
					</ul>
				</div>
				<div class="span4 center-footer">
					<h3>Connect with us.</h3>
					<a href="https://www.facebook.com/shopgab"><?= Asset::img('facebook.png') ?></a>
					<a href="https://twitter.com/shopgab"><?= Asset::img('twitter.png') ?></a>
					<a href="https://plus.google.com/113964272651935695754" rel="publisher"><?= Asset::img('google.png') ?></a>
				</div>
				<div class="span4 right-footer">
					<h3>Invite your friends.</h3>
					<input type="text" placeholder="yourfriend@email.com">
					<p class="faded">*Add additional emails by a comma</p>
					<button class="btn btn-success" type="button">Invite Now!</button>
				</div>
			</div>
			<p>&copy; 2013 ShopGab. All rights reserved. <?= Html::anchor('#', 'Privacy Policy') ?> - <?= Html::anchor('#', 'Terms of Use') ?></p>
		</div>

	</div>

	<?= isset($modal) ? $modal : null ?>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<?= Casset::render_js() ?>
</body>
</html>