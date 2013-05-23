<!DOCTYPE html>
<html>
  <head>
	<title>ItemNation</title>
	<?= Asset::css('landing/main.css') ?>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
	<!-- <script type="text/javascript" src="js/landing/main.js"></script> -->

  </head>

  <body>
	<div id="wrap">
		<header>
			<div class="inner">
				<a class="sprites logo" href="index.html" title="ItemNation"></a>
				<div class="landing-head">
					<?= Html::anchor('login', 'Login') ?> or 
					<?= Html::anchor('register', 'Sign up', array('class' => 'l-signup')) ?>
				</div>
			</div>
		</header>

		<div id="main" style="padding-bottom: 20px;">
			<div class="inner">
				<section id="landing">
					<?= Asset::img('landing/social-shopping-head.png', array('style' => "position: relative; top: -43px; margin: 0 auto; width: 600px; display: block;")) ?>

					<div id="video">
						<h2>How Does it Work?<h2>
						<div class="device-mac">
							<iframe width="448" height="257" src="http://www.youtube.com/embed/x0ArM1rtwNI" frameborder="0" allowfullscreen></iframe>
						</div>
					</div>

					<div id="welcome">
						<div class="hidden">
							<h2>Let your friends and family help you shop</h2>
							<span>Start today! Click <a href="">here</a></span>
							<a href="" class="button-big">
								<span>Wassup</span>
							</a>
						</div>

						<h2>Not sure what to buy?</h2>
						<?= Asset::img('landing/ask-your-friends.png', array('class' => 'ask')) ?>
						<a href="" class="button-big btn green2">Start Here</a>
						<span class="reigster-low">Start Today! <a href="">Click Here.</a></span>
					</div>
				</section>
			</div>

			<div class="welcome-footer">
				<span>&copy; 2013 ItemNation. All rights reserved.</span>
			</div>
		</div>
	</div>

  </body>
</html>