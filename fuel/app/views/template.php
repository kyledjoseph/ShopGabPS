<!DOCTYPE html>
<html>
  <head>
	<title><?= isset($title) ? $title : 'ItemNation' ?></title>
	<?= Asset::css('main.css') ?>

	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
	
	<?php //Asset::js('bootstrap/bootstrap.js') ?>
	<?php //Asset::js('bootstrap/bootstrap-alert.js') ?>
	<?php //Asset::css('bootstrap.css') ?>

	<?= Asset::js('main.js') ?>
	<?= Casset::render_js() ?>
	<?= Casset::render_css() ?>
  </head>

  <body>

	<div id="wrap">
		<header>
			<div class="inner">
				<?= Html::anchor('/', '', array('title' => 'ItemNation', 'class' => 'sprites logo')) ?>


				<i class="sprites mychats-logo"></i>


				<nav>
					<ul class="main-control">
						<li class="<?= (isset($active_nav) and $active_nav == 'dashboard') ? 'current' : null ?>">
							<?= Html::anchor('/', 'DASHBOARD') ?>
						</li>
						<li class="<?= (isset($active_nav) and $active_nav == 'wishlist') ? 'current' : null ?>">
							<?= Html::anchor('wishlist', 'WISH LISTS') ?>
						</li>
						<li class="<?= (isset($active_nav) and $active_nav == 'myitems') ? 'current' : null ?>">
							<?= Html::anchor('my/items', 'MY ITEMS') ?>
						</li>
					</ul>
					<ul class="user-control">
						<li>
							<span><i class="head-shot" style="background: url(../assets/img/head-shot.png);"></i> <?= Html::anchor('user/account', $user->email) ?> <?= Html::anchor('user/logout', 'logout') ?> <i class="sprites settings-icon"></i></span>
						</li>
					</ul>
				</nav>


				<!--
				<?php if (isset($user)): ?>
				<div id="user">
					<i class="sprites user-none"></i>
					<span><?= Html::anchor('user/account', $user->email) ?> <i class="sprites arrow-d"></i><?= Html::anchor('user/logout', 'logout') ?></span>

				</div>
				<?php else: ?>
				<div id="user">
					<span>
						<?= Html::anchor('user/login', 'login') ?> | 
						<?= Html::anchor('user/register', 'register') ?>
					</span>
				</div>
				<?php endif; ?>
				-->

			</div>
		</header>

		<div id="main">
			<div class="inner">

				<?php if (isset($notice)): ?>

				<div class="alert alert-<?= $notice->type ?>">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<?= $notice->message ?>
				</div>

				<?php endif; ?>
				
				<!--
				<div id="pagination">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><span>Home &amp; Garden</span></li>
					</ul>
				</div>
				-->

				<form id="search" class="hidden">
					<input type="text" placeholder="Search">
				</form>

				<div id="tabs" class="hidden">
					<ul>
						<li class="<?= (isset($active_nav) and $active_nav == 'activity') ? 'current' : null ?>">
							<i class="tab-r"></i>
							<i class="tab-current-first-l"></i>
							<i class="tab-current-r"></i>
							<?= Html::anchor('/', 'Activity') ?>
						</li>
						<li class="<?= (isset($active_nav) and $active_nav == 'myitems') ? 'current' : null ?>">
							<i class="tab-r"></i>
							<i class="tab-current-l"></i>
							<i class="tab-current-last-r"></i>
							<?= Html::anchor('my/items', 'My Items') ?>
						</li>
						<li class="<?= (isset($active_nav) and $active_nav == 'wishlist') ? 'current' : null ?>">
							<i class="tab-r"></i>
							<i class="tab-current-l"></i>
							<i class="tab-current-r"></i>
							<?= Html::anchor('wishlist', 'Wish Lists') ?>
						</li>
						
					</ul>
				</div>

				<?= isset($body) ? $body : null ?>

			</div>
		</div>
	</div>


	<footer>
		<div class="inner">

			<div class="footer-top">
				<div>
					<h3>Who are we?</h3>
			
					<ul>
						<li>
							<?= Html::anchor('about', 'About us') ?>
						</li>
						<li>
							<?= Html::anchor('about/team', 'Our team') ?>
						</li>
						<li>
							<a href="">ItemNation Blog</a>
						</li>
						<li>
							<a href="">Contact us</a>
						</li>


					</ul>	
				</div>

				<div>
					<h3>Connect with us.</h3>

					<ul class="footer-social">
						<li>
							<a href="">
								<i class="sprites footer-facebook"></i>
							</a>
						</li>
						<li>
							<a href="">
								<i class="sprites footer-twitter"></i>
							</a>
						</li>
						<li>
							<a href="">
								<i class="sprites footer-google"></i>
							</a>
						</li>
					</ul>
				</div>

				<div>
					<h3>Invite your friends</h3>

					<form>
						<input type="email" placeholder="yourfriend@email.com">
						<sub>* Add additional emails by a comma.</sub>
						<button type="submit">Invite Now</button>
					</form>


				</div>

			</div>

			<div class="footer-bottom">
				<span>&copy; 2013 ItemNation. All rights reserved. <?= Html::anchor('privacy', 'Privacy Policy') ?> - <?= Html::anchor('terms', 'Terms of Use') ?></span>
				<i class="sprites footer-logo"></i>
			</div>



		</div>
	</footer>

	

	<!-- Overlay and Dialog -->
	<div id="overlay"></div>
	<div class="dialog product">
		<div class="left">
			<div class="header">
				<div class="close">x</div>

					<h2>Grills - how do they work</h2>

					<div class="controls">
						<ul>
							<li>Propane</li>
							<li>Charcoal</li>
							<li>Smoker</li>
						</ul>
					</div>
				</div>

				<img src="img/sample-modal.png">

				<div class="terms">
					<h3>TERMS</h3>
					<ul>
						<li></li>
					</ul>
				</div>

			</div>
		<div class="right"></div>
	</div>

	<?= View::forge('analytics/site') ?>

  </body>
</html>