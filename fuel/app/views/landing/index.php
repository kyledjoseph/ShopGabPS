<!DOCTYPE html>
<html lang="en">
  <head>

	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>ShopGab - Shop Social!</title> 
	<meta name="description" content="Smart Bootstrap Theme"/>
	<meta name="keywords" content="Template, Theme, web, html5, css3, Bootstrap" />
	<meta name="author" content="Łukasz Holeczek from creativeLabs"/>
	<!-- end: Meta -->

	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- end: Mobile Specific -->

	<!-- start: Facebook Open Graph -->
	<meta property="og:title" content=""/>
	<meta property="og:description" content=""/>
	<meta property="og:type" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:image" content=""/>
	<!-- end: Facebook Open Graph -->

	<!-- start: CSS -->
	<?= Casset::render_css() ?>

	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">
	<!-- end: CSS -->

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!--[if IE 9]>
	<link href="css/styleie9.css" rel="stylesheet">
	<![endif]-->

  </head>
  <body>

	<!--start: Header -->
	<header>

	<!--start: Container -->
		<div class="container">

			<!--start: Navbar -->
			<div class="navbar navbar-inverse">
				<div class="navbar-inner">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="brand" href="index.html"><?= Asset::img('landing/logo.png', array('class' => 'logo-top')) ?></a>
					<div class="nav-collapse collapse">
						<!--<ul class="nav">
						<li><a href="#">Login</a>
						<li><a href="#">Register</a></li>
						</ul>-->
					</div>
				</div>
			</div>
			<!--end: Navbar -->

		</div>
		<!--end: Container-->			

	</header>
	<!--end: Header-->
	
	<!-- start: Slider -->
	<div class="slider-wrapper">
		<div id="da-slider" class="da-slider">
			<div class="slider-info">
				<h1>Shop Social!</h2>
				<h2>Because shopping is more fun with your friends</h2><br />

				<?= Form::open(array('action' => 'try')) ?>
				<div class="input-append">
					<input name="email" class="span2" id="appendedInput" type="text" placeholder="you@email.com">
					<button href="#" class="btn btn-success">Try it free!</a>
				</div>
			</div>
		</div>
	</div>
	<!-- end: Slider -->

	<!--start: Wrapper-->
	<div id="wrapper">
		<!--start: Container -->
		<div class="container">
			<hr>
			<!-- start: Hero Unit - Main hero unit for a primary marketing message or call to action -->
			<div class="hero-unit" style="display:none;">
				<h3>
					Smart is incredibly responsive, with a refreshingly clean responsive design and it has some awesome features, panorama sliders, 100+ icons, 50+ social icons, fancybox, isotope, google maps, facebook open graph and many, many more!
				</h3>
				<p><a class="btn btn-primary btn-large">Learn more &raquo;</a></p>
			</div>
			<!-- end: Hero Unit -->
			<hr>

			<!-- start: Row -->
			<div class="row">

				<!-- start: Icon Boxes -->
				<div class="icons-box-vert-container">

					<!-- start: Icon Box Start -->
					<div class="span4">
						<div class="icons-box-vert">
							<i class="ico-search ico-white circle-color-full"></i>
							<div class="icons-box-vert-info">
								<h3>Shop</h3>
								<p>Pick your favorite products from anywhere on the web.</p>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<!-- end: Icon Box-->

					<!-- start: Icon Box Start -->
					<div class="span4">
						<div class="icons-box-vert">
							<i class="ico-comments ico-white circle-color-full"></i>
							<div class="icons-box-vert-info">
								<h3>Gab</h3>
								<p>Invite your friends in for advice and recommendations.</p>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<!-- end: Icon Box -->

					<!-- start: Icon Box Start -->
					<div class="span4">
						<div class="icons-box-vert">
							<i class="ico-shopping-cart ico-white circle-color-full"></i>
							<div class="icons-box-vert-info">
								<h3>Buy</h3>
								<p>Purchase your favorite straight from the discussion.</p>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<!-- end: Icon Box -->

				</div>
				<!-- end: Icon Boxes -->

				<div class="clear"></div>
			</div>
			<!-- end: Row -->

			<hr>

			<!-- start: Row -->
			<div class="row">

				<div class="span9">

					<div class="title">
						<h3>Most Talked About Products</h3>
					</div>

					<!-- start: Row -->
					<div class="row">

						<div class="span3">
							<div class="picture">
								<a href="#" rel="image" title="mobile app">
									<?= Asset::img('landing/photostream/photostream_1.jpg') ?>
									<div class="image-overlay-zoom"></div>
								</a>
							</div>
							
							<div class="item-description">
								<h4><a href="#">4Moms Origami Stroller</a></h4>
							</div>
						</div>

						<div class="span3">
							<div class="picture">
								<a href="#">
									<?= Asset::img('landing/photostream/photostream_4.jpg') ?>
									<div class="image-overlay-link"></div>
								</a>
							</div>
							<div class="item-description">
								<h4><a href="#">Kate Spade NY Carousel Bangle</a></h4>
							</div>
						</div>

						<div class="span3">
							<div class="picture">
								<a href="" rel="image" title="mobile app">
									<?= Asset::img('landing/photostream/photostream_3.jpg') ?>
									<div class="image-overlay-zoom"></div>
								</a>
							</div>
							<div class="item-description">
								<h4><a href="#">Levana Jena Digital Baby Monitor</a></h4>
							</div>
						</div>

					</div>
					<!-- end: Row -->

				</div>

				<div class="span3">
					<!-- start: Testimonials-->
					<div class="testimonial-container">
						<div class="title"><h3>What Users Say</h3></div>
						<div class="testimonials-carousel" data-autorotate="3000">
							<ul class="carousel">
								<li class="testimonial">
									<div class="testimonials">ShopGab was amazing!  I still can’t believe how easy it was for me and friends to find and buy the best products for me and my new baby, and at the best prices.  Teamwork in shopping!</div>
									<div class="testimonials-bg"></div>
									<div class="testimonials-author">Jill Sandberg</div>
								</li>
							</ul>
						</div>
					</div>
					<!-- end: Testimonials-->
				</div>

			</div>
			<!-- end: Row -->

			<!-- start Clients List -->	
			<div style="display:none;" class="clients-carousel">

				<ul class="slides clients">
					<?= Asset::img('landing/logos/1.png') ?>
					<?= Asset::img('landing/logos/2.png') ?>
					<?= Asset::img('landing/logos/3.png') ?>
					<?= Asset::img('landing/logos/4.png') ?>
					<?= Asset::img('landing/logos/5.png') ?>
					<?= Asset::img('landing/logos/6.png') ?>
					<?= Asset::img('landing/logos/7.png') ?>
					<?= Asset::img('landing/logos/8.png') ?>
					<?= Asset::img('landing/logos/9.png') ?>
					<?= Asset::img('landing/logos/10.png') ?>
					<?= Asset::img('landing/logos/1.png') ?>
					<?= Asset::img('landing/logos/2.png') ?>
					<?= Asset::img('landing/logos/3.png') ?>
					<?= Asset::img('landing/logos/4.png') ?>
					<?= Asset::img('landing/logos/5.png') ?>
					<?= Asset::img('landing/logos/6.png') ?>
					<?= Asset::img('landing/logos/7.png') ?>
					<?= Asset::img('landing/logos/8.png') ?>
					<?= Asset::img('landing/logos/9.png') ?>
					<?= Asset::img('landing/logos/10.png') ?>
				</ul>

			</div>
			<!-- end Clients List -->

			<hr>

		</div>
		<!--end: Container-->

	</div>
	<!-- end: Wrapper  -->			

	<!-- start: Footer Menu -->
	<div id="footer-menu" class="hidden-tablet hidden-phone">

		<!-- start: Container -->
		<div class="container">

			<!-- start: Row -->
			<div class="row">

				<!-- start: Footer Menu Logo -->
				<div class="span2">
					<div id="footer-menu-logo">
						<a class="brand" href="#">
							<?= Asset::img('landing/logo.png', array('class' => 'logo-bottom')) ?>
						</a>
					</div>
				</div>
				<!-- end: Footer Menu Logo -->

				<!-- start: Footer Menu Links-->
				<div class="span9">
					<div id="footer-menu-links">
						<ul id="footer-nav">
							<!--<li><a href="index.html">Start</a></li>
							<li><a href="about.html">About</a></li>
							<li><a href="services.html">Services</a></li>
							<li><a href="pricing.html">Pricing</a></li>
							<li><a href="contact.html">Contact</a></li>-->
						</ul>
					</div>
				</div>
				<!-- end: Footer Menu Links-->

				<!-- start: Footer Menu Back To Top -->
				<div class="span1">
					<div id="footer-menu-back-to-top">
						<a href="#"></a>
					</div>
				</div>
				<!-- end: Footer Menu Back To Top -->

			</div>
			<!-- end: Row -->

		</div>
		<!-- end: Container  -->	

	</div>	
	<!-- end: Footer Menu -->

	<!-- start: Footer -->
	<div id="footer">

		<!-- start: Container -->
		<div class="container">

			<!-- start: Row -->
			<div class="row">

				<!-- start: About -->
				<div class="span3">
					<h3>About Us</h3>
					<p>
						At ShopGab our mission is to help shoppers confidently purchase the best products for their needs.  We provide a fun and simple way to store any product, gather feedback and get product recommendations from trusted friends.  No longer does online shopping have to be a lonely, individualized process!  Shop together and buy with the confidence and support of your friends and family.
					</p>
				</div>
				<!-- end: About -->

				<div class="span6 offset3">

					<!-- start: Follow Us -->
					<h3>Follow Us!</h3>
					<ul class="social-grid">
						<li>
							<div class="social-item">				
								<div class="social-info-wrap">
									<div class="social-info">
										<div class="social-info-front social-twitter">
											<a href="http://twitter.com/weshopgab"></a>
										</div>
										<div class="social-info-back social-twitter-hover">
											<a href="http://twitter.com/weshopgab"></a>
										</div>	
									</div>
								</div>
							</div>
						</li>
						
						<li>
							<div class="social-item">				
								<div class="social-info-wrap">
									<div class="social-info">
										<div class="social-info-front social-facebook">
											<a href="http://facebook.com/shopgab"></a>
										</div>
										<div class="social-info-back social-facebook-hover">
											<a href="http://facebook.com/shopgab"></a>
										</div>
									</div>
								</div>
							</div>
						</li>

					</ul>
					<!-- end: Follow Us -->

					<!-- 
					<form id="newsletter">
					<h3>Newsletter</h3>
					<p>Please leave us your email</p>
					<label for="newsletter_input">@:</label>
					<input type="text" id="newsletter_input"/>
					<input type="submit" id="newsletter_submit" value="submit">
					</form>
					-->

				</div>

			</div>
			<!-- end: Row -->	

		</div>
		<!-- end: Container  -->

	</div>
	<!-- end: Footer -->

	<!-- start: Copyright -->
	<div id="copyright">

		<!-- start: Container -->
		<div class="container">
			<div class="span12">
				<p>&copy; ShopGab 2013. All rights reserved..</p>
			</div>
		</div>
		<!-- end: Container  -->

	</div>	
	<!-- end: Copyright -->

	<!-- start: Java Script -->
	<!-- Placed at the end of the document so the pages load faster -->
	<?= Asset::js('landing/jquery-1.9.1.min.js') ?>
	<?= Asset::js('landing/bootstrap.min.js') ?>
	<?= Asset::js('landing/jquery.isotope.min.js') ?>
	<?= Asset::js('landing/jquery.imagesloaded.js') ?>
	<?= Asset::js('landing/carousel.js') ?>
	<?= Asset::js('landing/jquery.fancybox.js') ?>
	<?= Asset::js('landing/excanvas.js') ?>
	<?= Asset::js('landing/jquery.flot.js') ?>
	<?= Asset::js('landing/jquery.flot.pie.min.js') ?>
	<?= Asset::js('landing/jquery.flot.stack.js') ?>
	<?= Asset::js('landing/jquery.flot.resize.min.js') ?>
	<?= Asset::js('landing/custom.js') ?>
	<!-- end: Java Script -->

  </body>
</html>