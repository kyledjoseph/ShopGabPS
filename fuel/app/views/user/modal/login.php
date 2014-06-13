<div class="modal fade" id="loginModal">
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