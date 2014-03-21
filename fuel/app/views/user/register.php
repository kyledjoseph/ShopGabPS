	<section id="main-section">
		
		<h1>Register</h1>

    <form id="register_form" action="/user/register" method="post">
      <div class="type_wrapper">
        <label>Professional <input type="radio" class="radio professional_radio_button" name="login_type"
                                   checked="checked" value="professional"/></label>
        <label>Client <input type="radio" class="radio client_radio_button" name="login_type" value="client" id="client_radio"/></label>
      </div>
      <div class="register_wrapper form_wrapper">
        <div class="textlike_wrapper">
          <label>
            E-mail: <input type="email" name="email" required="true" value="<?php echo $data['email'] ?>"/>
            <?php if (isset($errors['email'])) { ?>
              <p class="warning"><?php echo $errors['email']; ?></p>
            <?php } ?>
          </label>
        </div>
        <div class="textlike_wrapper">
          <label>
            Password: <input type="password" name="password" required="true" value="<?php echo $data['password'] ?>"/>
            <?php if (isset($errors['password'])) { ?>
              <p class="warning"><?php echo $errors['password']; ?></p>
            <?php } ?>
          </label>
        </div>
        <div class="textlike_wrapper">
          <label>
            Confirm password: <input type="password" name="confirm" required="true" value="<?php echo $data['confirm'] ?>"/>
            <?php if (isset($errors['confirm'])) { ?>
              <p class="warning"><?php echo $errors['confirm']; ?></p>
            <?php } ?>
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
            <label>I Agree To The Terms &amp; Conditions <input type="checkbox" value="1" name="terms_conditions"
                                                                class="checkbox" checked="checked"/></label>
          </div>
          <div class="checkbox_wrapper">
            <label>Privacy policy <input type="checkbox" value="1" name="privacy_policy" class="checkbox"
                                         checked="checked"/></label>
          </div>
        </div>
        <div id="client_register_wrapper" style="display: none">
          <div class="textlike_wrapper">
            <label>
              PSID: <input type="text" name="psid" value="<?php echo $data['psid'] ?>"/>
              <?php if (isset($errors['psid'])) { ?>
                <p class="warning"><?php echo $errors['psid']; ?></p>
              <?php } ?>
            </label>

            <p>(Provided by your Personal Shopper)</p>
          </div>
        </div>
        <div class="submit_wrapper">
          <input type="submit" value="Create Account" class="btn green2">
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
  </script>