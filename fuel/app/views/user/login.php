	<section id="main-section">


		<h1>Login</h1>

    <form id="login_form" action="/login" method="post">
      <div class="login_wrapper form_wrapper">
        <div class="textlike_wrapper">
          <label>
            E-mail: <input type="email" name="email" required="true" value="<?php echo $data['email'] ?>" />
          </label>
        </div>
        <div class="textlike_wrapper">
          <label>
            Password: <input type="password" name="password" required="true" value="<?php echo $data['password'] ?>" />
          </label>
        </div>
        <div class="checkbox_wrapper">
          <label>Remember me <input type="checkbox" value="1" name="remember_me" class="checkbox" /></label>
        </div>
        <div class="link_wrapper">
          <a href="<?= Uri::create('forgot') ?>">Forgot password</a>
        </div>
        <div class="submit_wrapper">
          <input type="submit" value="Login" class="btn green2">
        </div>
      </div>
    </form>
	</section>

  <script src="//code.jquery.com/jquery.js"></script>