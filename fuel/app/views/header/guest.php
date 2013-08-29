  <div class="header container">
    <!-- Logo -->
    <div class="col-4 col-sm-2">
      <h1><a href="/"><img src="/assets/img/logo.png" alt="ShopGab" /></a></h1>
    </div>

    <!-- Navigation -->
    <div class="col-8 col-sm-10">
      <?php if (Fuel::$env !== 'production'): ?>
      <ul class="landing-nav nav nav-pills pull-right">
        <li><a href="http://shopgab.dev/auth/facebook?r=">Login</a></li>
        <li class="active"><a href="#registerModal" data-toggle="modal">Sign Up</button></a></li>
      </ul>
      <?php endif; ?>
    </div>
  </div>