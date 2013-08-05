<!DOCTYPE html>
<html>
<head>
  <title>ShopGab - Shop Socially!</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <script type="text/javascript" src="//use.typekit.net/kxv0tmh.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
  <link href="/assets/tmp/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="/assets/tmp/css/font-awesome.min.css" rel="stylesheet" media="screen">
</head>
<body>

  <!-- Header -->
  <div class="header container">
    <!-- Logo -->
    <div class="col-4 col-sm-2">
      <h1><img src="/assets/tmp/img/logo.png" alt="ShopGab" /></h1>
    </div>

    <!-- Navigation -->
    <div class="col-8 col-sm-10">
      <?php if (Fuel::$env !== 'production'): ?>
      <ul class="landing-nav nav nav-pills pull-right">
        <li><a href="#loginModal" data-toggle="modal">Login</a></li>
        <li class="active"><a href="#registerModal" data-toggle="modal">Sign Up</button></a></li>
      </ul>
      <?php endif; ?>
    </div>
  </div>

  <!-- Title -->
  <div class="title">
    <div class="title-inner">
      <div class="title-content container">
        <div class="col-12">
          <h2>Shop Socially!</h2>
          <h3>Because shopping is more fun with your friends.</h3>
            <div class="email-form row">
              <div class="col-12 col-sm-6 col-sm-offset-3">
                <?= Form::open(array('action' => 'try')) ?>
                <div class="input-group">
                  <input name="email" type="text" class="form-control" placeholder="you@email.com">
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-default" type="button">Sign Up Now</button>
                  </span>
                </div>
                <p class="title-soon">Sign up to receive updates.<br />Coming Soon: 09/01/13</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Steps -->
    <div class="steps container">
      <!-- Shop -->
      <a href="#">
        <div class="col-2 col-sm-1">
          <i class="icon-search icon-light icon-3x icon-background-circle"></i>
        </div>
        <div class="col-10 col-sm-3">
          <h3>Shop</h3>
          <p>Pick your favorite products from anywhere on the web.</p>
        </div>
      </a>

      <!-- Gab -->
      <a href="#">
        <div class="col-2 col-sm-1">
          <i class="icon-comments icon-light icon-3x icon-background-circle"></i>
        </div>
        <div class="col-10 col-sm-3">
          <h3>Gab</h3>
          <p>Invite your friends in for advice and recommendations.</p>
        </div>
      </a>

      <!-- Buy -->
      <a href="#">
        <div class="col-2 col-sm-1">
          <i class="icon-shopping-cart icon-light icon-3x icon-background-circle"></i>
        </div>
        <div class="col-10 col-sm-3">
          <h3>Buy</h3>
          <p>Purchase your favorite straight from the discussion.</p>
        </div>
      </a>
    </div>

    <!-- Proofs -->
    <div class="proofs container">
      <!-- Popular -->
      <div class="popular col-12 col-sm-8">
        <h3>Most Popular</h3>
        <hr />
        <div class="popular-images row">
          <div class="col-4 col-sm-4">
            <img src="/assets/tmp/img/photostream_1.jpg" />
          </div>
          <div class="col-4 col-sm-4">
            <img src="/assets/tmp/img/photostream_4.jpg" />
          </div>
          <div class="col-4 col-sm-4">
            <img src="/assets/tmp/img/photostream_3.jpg" />
          </div>
        </div>
      </div>

      <!-- Testimonial -->
      <div class="col-12 col-sm-4">
        <h3>What Users Say</h3>
        <hr />
        <div class="testimonial">
        <p>ShopGab was amazing! I still can’t believe how easy it was for me and friends to find and buy the best products for me and my new baby, and at the best prices. Teamwork in shopping!</p>
        </div>
        <div class="testimonial-credit">
        <span>Jill Sandberg</span>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <div class="footer">
    <div class="footer-white">
      <div class="container">
        <div class="about col-12 col-sm-6">
          <h4>About Us</h4>
          <hr />
          <p>At ShopGab our mission is to help shoppers confidently purchase the best products for their needs. We provide a fun and simple way to store any product, gather feedback and get product recommendations from trusted friends. No longer does online shopping have to be a lonely, individualized process! Shop together and buy with the confidence and support of your friends and family.</p>
        </div>
        <div class="follow col-12 col-sm-6">
          <h4>Follow Us</h4>
          <hr />
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
          </div>
        </div>
      </div>
      <div class="container">
      <div class="col-12">
          <p class="text-muted">&copy; ShopGab 2013, all rights reserved.</p>
          </div>
      </div>
    </div>

    <?= isset($modal) ? $modal : null ?>

    <!-- JavaScript plugins (requires jQuery) -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/assets/tmp/js/bootstrap.min.js"></script>
    <script src="/assets/js/script.js"></script>
    <?= Casset::render_js() ?>
  </body>
  </html>