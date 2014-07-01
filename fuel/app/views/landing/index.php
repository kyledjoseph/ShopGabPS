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
  <link href="/assets/css/bootstrap.min.css" rel="stylesheet" media="screen">

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
<body class="landing no-login">

  <div id='mw-pers-nav'>
    <ul>          
      <li><a>Learn more</a></li>
      <li><a class="" data-toggle="modal" href="#login">Login</a></li>
      <li><a class="" data-toggle="modal" href="#signup">Sign up</a></li>
    </ul>
  </div>

  <div id='mw-body-content'>
    
    <div id="top-bg">
      <div class='top-bg-wrap'>
        <div class="row header">
          <div class="col-xs-6 pull-left title">
            <a href="/"><img src="/landing/img/logo.png"/></a>
          </div>
          <div id='mw-pers-nav-button'>
            <div class="top-bar"></div>
            <div class="middle-bar">
            </div><div class="bottom-bar"></div>
          </div>
          <nav class="col-xs-6 authentication pull-right">
            <ul>          
              <li><a>Learn more</a></li>
              <li><a class="align-center register call-to-action sg-button-secondary" data-toggle="modal" href="#login">Login</a></li>
              <li><a class="pull-right btn-default btn sg-button-primary" data-toggle="modal" href="#signup">Sign up</a></li>
            </ul>      
          </nav>    
        </div>    
        <div class="col-xs-12 col-sm-10 tagline">
          <h1 class="clickthrough">Are you a <br/>personal shopper?</h1>
          <h2>Manage Clients, Shop Online, and Grow Your Business</h2>
          <a class='btn-default btn animated delay-cta bounce' href="#">Schedule a free demonstration</a>
        </div>
      </div>
    </div>

    <div id="steps">
      <div class='page-inner'>
        <div class="col-xs-12 col-sm-4 step manage">
          <div class='image-wrap'>
            <div>
              <img src="/landing/img/manage.png" alt="">
            </div>
          </div>    
          <h4>Manage</h4>
          <p>Manage your clients in one simple online location</p>
        </div>
        <div class="col-xs-12 col-sm-4 step shop">
          <div class='image-wrap'>
            <div>
              <img src="/landing/img/shop.png" alt="">
            </div>
          </div>  
          <h4>Shop</h4>
          <p>Shop with your clients in-store or online at anytime</p>
        </div>
        <div class="col-xs-12 col-sm-4 step store">
          <div class='image-wrap'>
            <div>
              <img src="/landing/img/notes.png" alt="">
            </div>
          </div> 
          <h4>Organize</h4>
          <p>Document your clients favorite items, styles, and more</p>
        </div>    
      </div>
    </div>

    <div id="testemonials">
      <div class="page-inner">
        <div class='col-xs-12 col-sm-6 testemonial'>
          <p>ShopGab was key to making my business successful! It enabled me to double the number of people I was working with and provide a better overall experience.</p>
          <div class='person'>
            <img src="/landing/img/testemonials1.png" alt="Testemonials">
            <h4>Eloise Choi</h4>
            <span>Freelance fashion stylist</span>
          </div>
        </div>
        <div class='col-xs-12 col-sm-6 testemonial'>
          <p>I don't want to even think about my business before ShopGab. My clients and I communicate clearer, find what they're looking for faster and we both couldn't be happier.</p>
          <div class='person'>
            <img src="/landing/img/testemonials2.png" alt="Testemonials">
            <h4>Kim Klein</h4>
            <span>Freelance fashion stylist</span>
          </div>
        </div>
      </div>
    </div>

    <div id='features'>
      <div class="page-inner">
        <div class='feature feature1'>
          <div class='col-xs-12 col-sm-7 image-cont'>
            <img src="/landing/img/shopgab-btn.jpg" alt="">
          </div>
          <div class='col-xs-12 col-sm-5 text-cont'>
            <h4>USE THE 'SHOPGAB' BUTTON</h4>
            <p>To quickly and easily capture any product on the web to share with your clients.</p>
            <a href="#">Find Out How</a>
          </div>
        </div>
        <div class='feature feature2'>
          <div class='col-xs-12 col-sm-5 text-cont'>
            <h4>EASILY MANAGE CLIENT</h4>
            <p>Information, product suggestions, desires, sizes, brand preferences, notes and more.</p>
            <a href="#">Learn More</a>
          </div>
          <div class='col-xs-12 col-sm-7 image-cont'>
            <img src="/landing/img/manage.jpg" alt="">
          </div>      
        </div>
      </div>
    </div>

    <div id="second-cta">
      <div class="page-inner">
        <h3>Ready to try it out?</h3>
        <a class="btn-default btn" data-toggle="modal" href="#signup">Schedule a free demonstration</a>
      </div>  
    </div>

    <div id='email_signup'>
      <div class="page-inner">
        <!-- Begin MailChimp Signup Form -->        
        <div id="mc_embed_signup">
        <form action="http://itemnation.us5.list-manage.com/subscribe/post?u=b84983320648e05e6e15fd5e9&amp;id=707fabcb7f" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
          <label for="mce-EMAIL">Subscribe to our mailing list</label>
          <div class='inputs'>
            <div class='mw-flex-box'>            
              <input type="email" value="" name="EMAIL" class="email mw-flex-box-item-1" id="mce-EMAIL" placeholder="Email Address" required>
                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                <div style="position: absolute; left: -5000px;"><input type="text" name="b_b84983320648e05e6e15fd5e9_707fabcb7f" tabindex="-1" value=""></div>
                <div class="clear"><input type="submit" value="Sign Up" name="subscribe" id="mc-embedded-subscribe" class="button btn-default"></div>  
            </div>
          </div>
          
          <p>We promise to respect your privacy.</p>
        </form>
        </div>

        <!--End mc_embed_signup-->
      </div>
    </div>
    <div>    
    

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


    <div id='mw-pers-nav-mask'>
      
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
      <form id="register_form" action="/user/register" method="post">
        <div class="type_wrapper">
          <label class='active'>Professional <input type="radio" class="radio professional_radio_button" name="login_type" checked="checked" value="professional"/></label>
          <label>Client <input type="radio" class="radio client_radio_button" name="login_type" value="client" /></label>
        </div>
        <div class="modal-body">                  
          <div class='wrapp'>
            <div class="register_wrapper form_wrapper">
              <div class="textlike_wrapper">
                <input placeholder="E-mail" type="email" name="email" required="true" />
              </div>
              <div class="textlike_wrapper">                
                  <input placeholder="Password" type="password" name="password" required="true" />                
              </div>
              <div class="textlike_wrapper">                
                  <input placeholder='Confirm password' type="password" name="confirm" required="true" />              
              </div>
              <div id="professional_register_wrapper">
                <div class="pricing_plan_select">
                  <div class='trial option active'>
                    <p>30 day<strong>Free Trial</strong></p>                    
                    <div class='checkbox'>                   
                    </div>
                  </div>
                  <div class='sep'>
                    
                  </div>
                  <div class='paid option'>
                    <p>monthly<strong>$29.99</strong></p>                    
                    <div class='checkbox'>                   
                    </div>
                  </div>
                </div>
                <div class="pricing_plan_wrapper">
                  <label>
                    <select id='pricing-plan' name="pricing_plan">
                      <option value="trial">30 day Free Trial</option>
                      <option value="paid">$29.99 / month</option>
                    </select>
                  </label>
                </div>
                <div class="checkbox_wrapper">
   <!--                <label><a href="/terms" target="_blank">I Agree To The Terms &amp; Conditions</a>
                    <input type="checkbox" value="1" name="terms_conditions" id="terms_conditions" class="checkbox" checked="checked"/>
                  </label> -->
                </div>
                <div class="checkbox_wrapper">
                  <!-- <label><a href="/privacy" target="_blank">Privacy policy</a>
                    <input type="checkbox" value="1" name="privacy_policy" id="privacy_policy" class="checkbox" checked="checked"/>
                  </label> -->
                </div>
              </div>
              <div id="client_register_wrapper" style='display: none;'>
                <div class="textlike_wrapper">
                    <input placeholder='PSID' type="text" name="psid" />
                  <p class='field-info'>(Provided by your Personal Shopper)</p>
                </div>
              </div>
              <div class="submit_wrapper">
                <input type="submit" value="Create Account" id="create_account" class="btn btn-default btn-shadow btn-big">
              </div>
            </div>
          </div>        
        </div>
      </form>
    </div>
    <p id='switch-to-login' class='switch-modal'>Already a user? <a>Log In</a>.</p>
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
          <div class="login_wrapper form_wrapper">
            <div class="textlike_wrapper">
                <input class='check' placeholder='E-mail' type="email" name="email" required="true" />              
            </div>
            <div class="textlike_wrapper">
                <input placeholder="Password" type="password" name="password" required="true" />
            </div>
            <div class='form-group'>
              <div class="checkbox_wrapper">
                <input type="checkbox" value="1" name="remember_me" class="checkbox" /><label>Remember me</label>
              </div>
              <div class="link_wrapper">
                <a href="<?= Uri::create('forgot') ?>">Forgot password</a>
              </div>
            </div>            
            <div class="submit_wrapper">
              <input class='btn btn-default btn-shadow btn-big' type="submit" value="Login" class="sg-button-secondary">
            </div>
          </div>
        </form>
      </div>
    </div>
    <p id='switch-to-signup' class='switch-modal'>Not a member? <a>Sign Up</a>.</p>
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

  // privacy & terms checkboxes
  $('input#terms_conditions, input#privacy_policy').change(function(event) {
    var create_account = $('#create_account');
    if ($('input#terms_conditions').prop('checked') && $('input#privacy_policy').prop('checked')) {
      create_account.prop('disabled', false);
    } else {
      create_account.prop('disabled', true);
    } // if
  });

  // Active tabat signup form
  $('.type_wrapper label').click(function(event) {
    $('.type_wrapper label').removeClass('active');
    $(this).addClass('active');
  });

  // Pricing plan select
  $('.trial').click(function(event) {
    $("#pricing-plan").val('trial');
    $('.pricing_plan_select .option').removeClass('active');
    $(this).addClass('active');
  });
  $('.paid').click(function(event) {
    $("#pricing-plan").val('paid');
    $('.pricing_plan_select .option').removeClass('active');
    $(this).addClass('active');
  });

  // Mobile menu
  jQuery("#mw-pers-nav-button, #mw-pers-nav-mask").on('click', function() {
    jQuery("#mw-pers-nav,  #mw-body-content, #mw-pers-nav-button, #mw-pers-nav-mask").toggleClass("mw-pers-nav-active");
  });

  // Switch modals
  $('#switch-to-signup a').click(function(event) {
    $('#login').modal('hide');
    $('#signup').modal('show');
  });
  $('#switch-to-login a').click(function(event) {
    $('#signup').modal('hide');
    $('#login').modal('show');
  });

</script>
</body>
</html>
