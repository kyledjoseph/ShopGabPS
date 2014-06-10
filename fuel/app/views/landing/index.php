<!DOCTYPE html>
<html>
<head>
  <title>ShopGab</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Typekit -->
  <script type="text/javascript" src="//use.typekit.net/kxv0tmh.js"></script>
  <script type="text/javascript">try {
      Typekit.load();
    } catch (e) {
    }</script>

  <!-- Bootstrap -->
  <link href="/landing/css/main.css" rel="stylesheet" media="screen">

  <?php echo Sprockets::css('style.scss'); ?>

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="../../assets/js/html5shiv.js"></script>
  <script src="../../assets/js/respond.min.js"></script>
  <![endif]-->
  <!-- start Mixpanel -->
  <script type="text/javascript">
    (function (e, b) {
      if (!b.__SV) {
        var a, f, i, g;
        window.mixpanel = b;
        a = e.createElement("script");
        a.type = "text/javascript";
        a.async = !0;
        a.src = ("https:" === e.location.protocol ? "https:" : "http:") + '//cdn.mxpnl.com/libs/mixpanel-2.2.min.js';
        f = e.getElementsByTagName("script")[0];
        f.parentNode.insertBefore(a, f);
        b._i = [];
        b.init = function (a, e, d) {
          function f(b, h) {
            var a = h.split(".");
            2 == a.length && (b = b[a[0]], h = a[1]);
            b[h] = function () {
              b.push([h].concat(Array.prototype.slice.call(arguments, 0)))
            }
          }

          var c = b;
          "undefined" !== typeof d ? c = b[d] = [] : d = "mixpanel";
          c.people = c.people || [];
          c.toString = function (b) {
            var a = "mixpanel";
            "mixpanel" !== d && (a += "." + d);
            b || (a += " (stub)");
            return a
          };
          c.people.toString = function () {
            return c.toString(1) + ".people (stub)"
          };
          i = "disable track track_pageview track_links track_forms register register_once alias unregister identify name_tag set_config people.set people.set_once people.increment people.append people.track_charge people.clear_charges people.delete_user".split(" ");
          for (g = 0; g < i.length; g++)f(c, i[g]);
          b._i.push([a, e, d])
        };
        b.__SV = 1.2
      }
    })(document, window.mixpanel || []);
    mixpanel.init("0c06e22671690f1006e02a4d071839e9");
  </script>
  <!-- end Mixpanel -->
</head>
<body class="landing">
<div class="background">
  <div class="row header">
    <div class="col-xs-6 title">
      <a href="/"><img src="/landing/img/logo.png"/></a>
    </div>
    <div class="col-xs-6 authentication">
      <a class="pull-right align-center sg-button-primary" data-toggle="modal" href="#signup">Sign&nbsp;up</a>
      <h4 class="pull-right new_user">New user?</h4>
    </div>
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 strong-text">
      <h1 class="clickthrough">Smart&nbsp;personal&nbsp;shopping</h1>
      <a class="align-center register call-to-action sg-button-secondary" data-toggle="modal" href="#login">Login</a>
    </div>
  </div>
  <div class="table">
    <div class="foreground">
      <video controls class="video">
        <source src="/landing/vid/landing.mp4" type="video/mp4">
        <source src="/landing/vid/landing.webm" type="video/webm">
        Your browser doesn't support HTML5 video.
      </video>
    </div>
  </div>
</div>
<div class="steps clearfix">
  <div class="col-xs-12 col-sm-4 step">
    <h2><span class="glyphicon glyphicon-shopping-cart"></span> Shop</h2>

    <p>Capture and compare products from any website.</p>
  </div>
  <div class="col-xs-12 col-sm-4 step">
    <h2><span class="glyphicon glyphicon-bullhorn"></span> Gab </h2>

    <p>Invite your friends for opinions and to help search.</p>
  </div>
  <div class="col-xs-12 col-sm-4 step">
    <h2><span class="glyphicon glyphicon-gift"></span> Buy</h2>

    <p>Purchase with the support of people you trust.</p>
  </div>
</div>
<div class="container">
  <hr>
  <div class="quote">
    <p>&ldquo;90% of people show an impact in their purchase decisions by their friends and family.&rdquo;</p>
  </div>
  <div class="author">
    <div>Bing.com</div>
  </div>
</div>
<div class="products">
  <div class="container">
    <h3 class="featured"><span class="glyphicon glyphicon-star"></span> Featured on Shopgab</h3>

    <div class="product">
      <div class="box">
        <a data-toggle="modal" href="#signup"><img src="/landing/img/anthropologie.jpg"/></a>
      </div>
    </div>
    <div class="product">
      <div class="box">
        <a data-toggle="modal" href="#signup"><img src="/landing/img/Camera.jpg"/></a>
      </div>
    </div>
    <div class="product">
      <div class="box">
        <a data-toggle="modal" href="#signup"><img src="/landing/img/three_sisters_necklace.jpg"/></a>
      </div>
    </div>
    <div class="product">
      <div class="box">
        <a data-toggle="modal" href="#signup"><img src="/landing/img/Backpack.jpg"/></a>
      </div>
    </div>
    <div class="product">
      <div class="box">
        <a data-toggle="modal" href="#signup"><img src="/landing/img/dress.jpg"/></a>
      </div>
    </div>
    <div class="product">
      <div class="box">
        <a data-toggle="modal" href="#signup"><img src="/landing/img/jamie-oliver-flavour-shaker.jpg"/></a>
      </div>
    </div>
  </div>
</div>
<div class="second-cta">
  <h2>Ready to start shopping with confidence?</h2>
  <a class="sg-button-secondary" data-toggle="modal" href="#signup">Try&nbsp;it&nbsp;now&nbsp;for&nbsp;free</a>
</div>
<div class="footer">
  <div class="col-xs-12">
    <div class="col-xs-6 pages">
      <a href="/terms">Terms of Use</a> /
      <a href="/privacy">Privacy Policy</a>
      <br>
      &copy; ShopGab 2013, all rights reserved.
    </div>
    <div class="col-xs-6 pages align-right">
      <a href="https://shopgab.wordpress.com/" target="_blank">Blog </a> /
      <a href="http://pinterest.com/WeShopGab/boards/" target="_blank">Pinterest </a> /
      <a href="http://twitter.com/weshopgab" target="_blank">Twitter </a> /
      <a href="http://facebook.com/shopgab" target="_blank">Facebook </a> /
      <a href="https://plus.google.com/u/0/113964272651935695754/posts" target="_blank">Google+</a> /
      <a href="http://rackspace.com" target="_blank">Rackspace</a>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header align-center">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" class="align-center" id="myModalLabel">Sign up to ShopGab!</h4>
      </div>
      <div class="modal-body">
        <form id="register_form" action="/user/register" method="post">
          <div class="type_wrapper">
            <label>Professional <input type="radio" class="radio professional_radio_button" name="login_type" checked="checked" value="professional"/></label>
            <label>Client <input type="radio" class="radio client_radio_button" name="login_type" value="client" /></label>
          </div>
          <div class="register_wrapper form_wrapper">
            <div class="textlike_wrapper">
              <label>
                E-mail: <input type="email" name="email" required="true" />
              </label>
            </div>
            <div class="textlike_wrapper">
              <label>
                Password: <input type="password" name="password" required="true" />
              </label>
            </div>
            <div class="textlike_wrapper">
              <label>
                Confirm password: <input type="password" name="confirm" required="true" />
              </label>
            </div>
            <div id="professional_register_wrapper">
              <div class="pricing_plan_wrapper">
                <label>
                  Pricing Plan:
                  <select name="pricing_plan">
                    <option value="trial">30 day Free Trial</option>
                    <option value="paid">$29.99 / month</option>
                  </select>
                </label>
              </div>
              <div class="checkbox_wrapper">
                <label>I Agree To The Terms &amp; Conditions <input type="checkbox" value="1" name="terms_conditions" class="checkbox" checked="checked" /></label>
              </div>
              <div class="checkbox_wrapper">
                <label>Privacy policy <input type="checkbox" value="1" name="privacy_policy" class="checkbox" checked="checked" /></label>
              </div>
            </div>
            <div id="client_register_wrapper">
              <div class="textlike_wrapper">
                <label>
                  PSID: <input type="text" name="psid" />
                </label>
                <p>(Provided by your Personal Shopper)</p>
              </div>
            </div>
            <div class="submit_wrapper">
              <input type="submit" value="Create Account" class="sg-button-secondary">
            </div>
          </div>
        </form>
      </div>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header align-center">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" class="align-center" id="myModalLabel">Login</h4>
      </div>
      <div class="modal-body">
        <form id="login_form" action="/login" method="post">
          <div class="type_wrapper">
            <label>Professional <input type="radio" class="radio professional_radio_button" name="login_type" checked="checked" value="professional"/></label>
            <label>Client <input type="radio" class="radio client_radio_button" name="login_type" value="client" /></label>
          </div>
          <div class="login_wrapper form_wrapper">
            <div class="textlike_wrapper">
              <label>
                E-mail: <input type="email" name="email" required="true" />
              </label>
            </div>
            <div class="textlike_wrapper">
              <label>
                Password: <input type="password" name="password" required="true" />
              </label>
            </div>
            <div class="checkbox_wrapper">
              <label>Remember me <input type="checkbox" value="1" name="remember_me" class="checkbox" /></label>
            </div>
            <div class="link_wrapper">
              <a href="<?= Uri::create('forgot') ?>">Forgot password</a>
            </div>
            <div class="submit_wrapper">
              <input type="submit" value="Login" class="sg-button-secondary">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//code.jquery.com/jquery.js"></script>
<script src="/landing/js/main.js"></script>
<script type="text/javascript">

  // register professional/client
  $('form#register_form input[name=login_type]').change(function() {
    checked_radio = $(this);
    if (checked_radio.val() == 'client') {
      $('#professional_register_wrapper').hide();
      $('#client_register_wrapper').show();
      $('#client_register_wrapper input').attr('required', true);
    } else {
      $('#professional_register_wrapper').show();
      $('#client_register_wrapper').hide();
      $('#client_register_wrapper input').removeAttr('required');
    } // if
  });
</script>
</body>
</html>
