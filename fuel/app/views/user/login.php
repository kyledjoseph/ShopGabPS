	<section id="main-section">


		<h1>Login</h1>

    <form id="login_form" action="/login" method="post">
      <div class="login_wrapper form_wrapper">
        <div class="textlike_wrapper form-group">
          <label>
            E-mail: 
          </label>
          <input class='form-control' type="email" name="email" required="true" value="<?php echo $data['email'] ?>" />
        </div>
        <div class="textlike_wrapper form-group">
          <label>
            Password:
          </label>
          <input class='form-control' type="password" name="password" required="true" value="<?php echo $data['password'] ?>" />
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
          <input type="submit" value="Login" class="btn btn-default">
        </div>
      </div>
    </form>
	</section>

  <script src="//code.jquery.com/jquery.js"></script>