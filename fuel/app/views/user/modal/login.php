

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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