<form id="login_form" action="/login" method="post">
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
    <div class="submit_wrapper">
      <input type="submit" value="Login" class="sg-button-secondary">
    </div>
  </div>
</form>