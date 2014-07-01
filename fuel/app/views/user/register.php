	<section id="main-section">
		
		<h1>Register</h1>

    <form id="register_form" action="/user/register" method="post">
      <div class="type_wrapper form-group">
        <label>Account type</label>
        <div class='radio-option'>
          <input id="type-pro" type="radio" class="radio professional_radio_button" name="login_type" checked="checked" value="professional"/>
          <label for="type-pro">Professional</label>  
        </div>
        <div class='radio-option'>
          <input id='type-cli' type="radio" class="radio client_radio_button" name="login_type" value="client" id="client_radio"/>
          <label for="type-cli">Client</label>                
        </div>
      </div>
      <div class="register_wrapper form_wrapper">
        <div class="textlike_wrapper form-group">
          <label>
            E-mail:
          </label>
          <input class='form-control' type="email" name="email" required="true" value="<?php echo $data['email'] ?>"/>
          <?php if (isset($errors['email'])) { ?>
            <p class="warning"><?php echo $errors['email']; ?></p>
          <?php } ?>
        </div>
        <div class="textlike_wrapper form-group">
          <label>
            Password:
          </label> 
          <input class='form-control' type="password" name="password" required="true" value="<?php echo $data['password'] ?>"/>
            <?php if (isset($errors['password'])) { ?>
              <p class="warning"><?php echo $errors['password']; ?></p>
            <?php } ?>
          
        </div>
        <div class="textlike_wrapper form-group">
          <label>
            Confirm password:
          </label> 
          <input class='form-control' type="password" name="confirm" required="true" value="<?php echo $data['confirm'] ?>"/>
          <?php if (isset($errors['confirm'])) { ?>
            <p class="warning"><?php echo $errors['confirm']; ?></p>
          <?php } ?>
          
        </div>
        <div id="professional_register_wrapper">
          <div class="pricing_plan_wrapper form-group">
            <label>
              Pricing Plan:              
            </label>
            <div>
              <select class='form-control' name="pricing_plan">
                <option value="trial">30 day Free Trial</option>
                <option value="paid">$29.99 / month</option>
              </select>  
            </div>
            
          </div>
          <div class="checkbox_wrapper form-group">
            <input type="checkbox" value="1" name="terms_conditions" id="terms_conditions" class="checkbox" checked="checked"/>
            <label><a href="/terms" target="_blank">I Agree To The Terms &amp; Conditions</a>              
            </label>
          </div>
          <div class="checkbox_wrapper form-group">
            <input type="checkbox" value="1" name="privacy_policy" id="privacy_policy" class="checkbox" checked="checked"/>
            <label><a href="/privacy" target="_blank">Privacy policy</a></label>
          </div>
        </div>
        <div id="client_register_wrapper" style="display: none">
          <div class="textlike_wrapper form-group">
            <label>
              PSID: 
            </label>
            <input class='form-control' type="text" name="psid" value="<?php echo $data['psid'] ?>"/>
            <?php if (isset($errors['psid'])) { ?>
              <p class="warning"><?php echo $errors['psid']; ?></p>
            <?php } ?>            
            <p>(Provided by your Personal Shopper)</p>
          </div>
        </div>
        <div class="submit_wrapper form-group">
          <input type="submit" value="Create Account" id="create_account" class="btn btn-default">
        </div>
      </div>
    </form>
	</section>

  <script src="//code.jquery.com/jquery.js"></script>
  <script type="text/javascript">
    // register professional/client
    $('form#register_form input[name=login_type]').change(function () {
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

    <?php if ($client) { ?>
      $('#client_radio').click();
    <?php } ?>

    // privacy & terms checkboxes
    $('input#terms_conditions, input#privacy_policy').change(function(event) {
      var create_account = $('#create_account');
      if ($('input#terms_conditions').prop('checked') && $('input#privacy_policy').prop('checked')) {
        create_account.prop('disabled', false);
      } else {
        create_account.prop('disabled', true);
      } // if
    });
  </script>