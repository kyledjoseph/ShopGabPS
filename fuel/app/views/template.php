<!DOCTYPE html>
<html>
<head>
	<title>ShopGab - Shop Socially!</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap -->
	<script type="text/javascript" src="//use.typekit.net/kxv0tmh.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
  <!--  jQuery-->
  <script src="//code.jquery.com/jquery.js"></script>

  <!-- Main JS -->
  <?php echo Sprockets::js('main.js'); ?>

	<link href="/assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="/assets/css/font-awesome.min.css" rel="stylesheet" media="screen">
	<?= Casset::render_css() ?>
<!-- start Mixpanel --><script type="text/javascript">(function(e,b){if(!b.__SV){var a,f,i,g;window.mixpanel=b;a=e.createElement("script");a.type="text/javascript";a.async=!0;a.src=("https:"===e.location.protocol?"https:":"http:")+'//cdn.mxpnl.com/libs/mixpanel-2.2.min.js';f=e.getElementsByTagName("script")[0];f.parentNode.insertBefore(a,f);b._i=[];b.init=function(a,e,d){function f(b,h){var a=h.split(".");2==a.length&&(b=b[a[0]],h=a[1]);b[h]=function(){b.push([h].concat(Array.prototype.slice.call(arguments,0)))}}var c=b;"undefined"!==
typeof d?c=b[d]=[]:d="mixpanel";c.people=c.people||[];c.toString=function(b){var a="mixpanel";"mixpanel"!==d&&(a+="."+d);b||(a+=" (stub)");return a};c.people.toString=function(){return c.toString(1)+".people (stub)"};i="disable track track_pageview track_links track_forms register register_once alias unregister identify name_tag set_config people.set people.set_once people.increment people.append people.track_charge people.clear_charges people.delete_user".split(" ");for(g=0;g<i.length;g++)f(c,i[g]);
b._i.push([a,e,d])};b.__SV=1.2}})(document,window.mixpanel||[]);
mixpanel.init("0c06e22671690f1006e02a4d071839e9");</script><!-- end Mixpanel -->

  <!-- Main CSS -->
  <?php echo Sprockets::css('style.scss'); ?>

	</head>

	<body class='login'>

		<!-- Header -->
		<?= $view->header ?>

		<?php if (isset($notice)): ?>
		<div class="alert alert-<?= $notice->type ?>">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?= $notice->message ?>
		</div>
	<?php endif; ?>

  <div id='main'>
    <div class="page-inner">
	     <?= $body ?>
    </div>
  </div>
  </div>
  <!-- Footer -->

  <?php if (Auth::check()) { ?> 
    <div id="mw-footer">
      <div class="page-inner">
        <div class="footer-data">
          <div class="about col-12 col-sm-7">
            <h4>About</h4>
            <p>At ShopGab our mission is to help shoppers confidently purchase the best products for their needs. We provide a fun and simple way to store any product, gather feedback and get product recommendations from trusted friends. No longer does online shopping have to be a lonely, individualized process! Shop together and buy with the confidence and support of your friends and family.</p>
          </div>
          <div class="follow col-12 col-sm-4 pull-right">
            <h4>Join the conversation</h4>
            <div class="social-links">
              <a href="http://facebook.com/shopgab" class="facebook">
                <i class="icon-facebook icon-2x icon-light"></i>
            </a>
              <a href="http://twitter.com/weshopgab" class="twitter">
                <i class="icon-twitter icon-2x icon-light"></i>
              </a>
              <a href="http://pinterest.com/WeShopGab/boards/" class="pinterest">
                <i class="icon-pinterest icon-2x icon-light"></i>
              </a>
              <a href="https://plus.google.com/u/0/113964272651935695754/posts" class="google-plus">
                <i class="icon-google-plus icon-2x icon-light"></i>
              </a>
              <a href="https://shopgab.wordpress.com" class="wordpress">
                <img src="/assets/img/wordpress.png" />
              </a>
            </div>
            <!-- <a href="http://rackspace.com/"><img class="rackspace" src="/assets/img/rackspace.png" /></a> -->
          </div>
        </div>
        <div class="footer-closer">
        <div class="col-12">
            <p class="text-muted">&copy; ShopGab 2013, all rights reserved.</p>
            </div>
        </div>
      </div>
  <?php } 
  else {?>
   <div id="footer-login">
     <div class="col-xs-12">
       
       <div class="col-xs-12 social-icons pages">
         <div class="page-inner">
           <a class='fb' href="http://facebook.com/shopgab" target="_blank">Facebook </a>
           <a class='tw' href="http://pinterest.com/WeShopGab/boards/" target="_blank">Pinterest </a>
           <a class='pi' href="http://twitter.com/weshopgab" target="_blank">Twitter </a>      
           <a class='em' href="mailto:Kyle@shopgab.com" target="_blank">Rackspace</a>
         </div>     
       </div>



       <div class="col-xs-12 closer">
         <div class="page-inner">
           <p class='info'>1871, 222 MERCHANDISE MART PLAZA, SUITE 1212, CHICAGO, IL 60654, USA3094721533 <a href="mailto:kyle@shopgab.com">kyle@shopgab.com</a></p>
           <p class='copyright'>ShopGab 2014, all rights reserved.</p> 
         </div>
       </div>  

     </div>
   </div>
  <?php } ?>



	<a href="#feedbackModal" class="feedback-button" data-toggle="modal"><img src="/assets/img/feedback.png" /></a>

	<?= isset($modal) ? $modal : null ?>
	<div id="fb-root"></div>



	<!-- JavaScript plugins (requires jQuery) -->
	<script src="http://code.jquery.com/jquery.js"></script>
  <script src="//cdn.optimizely.com/js/303981027.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="/assets/js/script.js"></script>
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-42842086-1', 'shopgab.com');
  ga('send', 'pageview');

</script>
	<?= Casset::render_js() ?>
</body>
</html>