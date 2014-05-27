<div class="row">
  <div class="col-12 col-sm-6">
    <h2 class="header-underline">My Account</h2>
    <h3 class="header-underline">Profile Information</h3>
    <p>User type: <?= $user->getVerboseAccountType() ?></p>
    <?php if ($professional) { ?>
      <p>Pricing plan: <?= $professional->getVerbosePricingPlanType() ?></p>
      <input type="checkbox" id="automatic_plan_renewal" <?php if ($professional->automatic_plan_renewal) { ?> checked="checked" <?php } ?> />
      <label for="automatic_plan_renewal">Automatic plan renewal</label>
      <p>Pricing plan: $<?= $professional->getPrice() ?>/month</p>
    <?php } ?>

    <h3 class="header-underline">Profile Picture</h3>
    <?= Form::open(array('action' => 'account/avatar', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal')) ?>
    <div class="control-group account-form">
      <label class="control-label" for="inputName"></label>

      <div class="controls">
        <img class="account-img" src="<?= $user->get_avatar_uri() ?>"/>

      </div>
      <label class="control-label" for="avatar">Change avatar:</label>

      <div class="controls">
        <input class="avatar-upload" type="file" name="avatar" id="avatar"/>
      </div>
    </div>
    <div class="control-group account-form">
      <div class="controls">
        <button class="btn btn-default marg-top">Upload Avatar</button>
      </div>
    </div>

    <?= Form::close() ?>

    <hr>

    <?= Form::open(array('class' => 'form-horizontal')) ?>

    <div class="control-group account-form">
      <label class="control-label" for="name">Name:</label>

      <div class="controls">
        <input type="text" class="form-control" name="name" id="inputName" placeholder="John Smith"
               value="<?= $user->display_name() ?>">
      </div>
    </div>

    <div class="control-group account-form">
      <label class="control-label" for="email">Email:</label>

      <div class="controls">
        <input type="text" class="form-control" name="email" id="inputEmail" placeholder="Email"
               value="<?= $user->email ?>">
      </div>
    </div>

    <div class="control-group account-form">
      <div class="controls">
        <button class="btn btn-default marg-top">Update Account</button>
      </div>
    </div>
    <?= Form::close() ?>

    <hr>

    <h3 class="header-underline">Notifications</h3>
    <?= Form::open(array('action' => 'account/notifications', 'class' => 'form-horizontal')) ?>
    <div class="control-group account-form">
      <div class="controls">
        <input type="checkbox" id="receive_notifications" <?php if ($user->receive_notifications) { ?> checked="checked" <?php } ?> />
        <label for="receive_notifications">Receive notifications</label>
      </div>
    </div>
    <?= Form::close() ?>

    <hr>

    <h3 class="header-underline">Password</h3>
    <?= Form::open(array('class' => 'form-horizontal')) ?>
    <div class="control-group">
      <div class="controls">
        <span class="facebook-account"><?= Html::anchor('account/password', 'Change Password') ?></span>
      </div>
    </div>

    <?= Form::close() ?>
  </div>

  <div class="col-11 col-sm-5">
    <?php if ($user->group == Model_User::PROFESSIONAL_GROUP_ID) { ?>
<!--      professional payment data-->
      <h3 class="header-underline">Billing Info</h3>
      <?= Form::open(array('action' => 'account/paypal', 'class' => 'form-horizontal', 'id' => 'checkout_form')) ?>
        <div class="control-group account-form">
          <label class="control-label" for="paypal_first_name">First Name*</label>

          <div class="controls">
            <input type="text" class="form-control" name="paypal[first_name]" id="paypal_first_name" value="<?= $paypal->first_name?>" required="">
          </div>
        </div>
        <div class="control-group account-form">
          <label class="control-label" for="paypal_last_name">Last Name*</label>

          <div class="controls">
            <input type="text" class="form-control" name="paypal[last_name]" id="paypal_last_name" value="<?= $paypal->last_name?>" required="">
          </div>
        </div>
        <div class="control-group account-form">
          <label class="control-label" for="paypal_company">Company</label>

          <div class="controls">
            <input type="text" class="form-control" name="paypal[company]" id="paypal_company" value="<?= $paypal->company?>">
          </div>
        </div>
        <div class="control-group account-form">
          <label class="control-label" for="paypal_email">Email Address*</label>

          <div class="controls">
            <input type="email" class="form-control" name="paypal[email]" id="paypal_email" value="<?= $paypal->email?>" required="">
          </div>
        </div>
        <div class="control-group account-form">
          <label class="control-label" for="paypal_address">Address*</label>

          <div class="controls">
            <input type="text" class="form-control" name="paypal[address]" id="paypal_address" value="<?= $paypal->address?>" required="">
          </div>
        </div>
        <div class="control-group account-form">
          <label class="control-label" for="paypal_city">City*</label>

          <div class="controls">
            <input type="text" class="form-control" name="paypal[city]" id="paypal_city" value="<?= $paypal->city?>" required="">
          </div>
        </div>
        <div class="control-group account-form">
          <label class="control-label" for="paypal_zip_postal_code">Zip/Postal Code*</label>

          <div class="controls">
            <input type="text" class="form-control" name="paypal[zip_postal_code]" id="paypal_zip_postal_code" value="<?= $paypal->zip_postal_code?>" required="">
          </div>
        </div>
        <div class="control-group account-form">
          <label class="control-label" for="paypal_state_province">State/Province*</label>

          <div class="controls">
            <select class="form-control" name="paypal[state_province]" id="paypal_state_province">
              <?= Model_Paypal::selectListOfStates($paypal->state_province) ?>
            </select>
          </div>
        </div>
        <div class="control-group account-form">
          <label class="control-label" for="paypal_country">Country*</label>

          <div class="controls">
            <select class="form-control" name="paypal[country]" id="paypal_country">
              <?= Model_Paypal::selectListOfCountries($paypal->country) ?>
            </select>
          </div>
        </div>
        <div class="control-group account-form">
          <label class="control-label" for="paypal_telephone">Telephone*</label>

          <div class="controls">
            <input type="text" class="form-control" name="paypal[telephone]" id="paypal_telephone" value="<?= $paypal->telephone?>" required="">
          </div>
        </div>

      <h3 class="header-underline">Credit Card Information</h3>

      <div class="control-group account-form">
        <label class="control-label" for="paypal_card_type">Credit Card Type*</label>

        <div class="controls">
          <select class="form-control" name="paypal[card_type]" id="paypal_card_type">
            <?= Model_Paypal::selectListOfCCTypes($paypal->card_type) ?>
          </select>
        </div>
      </div>

      <div class="control-group account-form">
        <label class="control-label" for="paypal_card_number">Credit Card Number*</label>

        <div class="controls">
          <input type="text" class="form-control" name="paypal[card_number]" id="paypal_card_number" value="<?= $paypal->card_number?>" required="">
        </div>
      </div>

      <div class="control-group account-form">
        <label class="control-label" for="paypal_cvv2">CVV2*</label>

        <div class="controls">
          <input type="text" class="form-control" name="paypal[cvv2]" id="paypal_cvv2" value="<?= $paypal->cvv2?>" required="" maxlength="4">
        </div>
      </div>

      <div class="control-group account-form">
        <label class="control-label" for="paypal_expire_month">Expiration month*</label>

        <div class="controls">
          <select class="form-control" name="paypal[expire_month]" id="paypal_expire_month">
            <?= Model_Paypal::selectExpireMonths($paypal->expire_month) ?>
          </select>
        </div>
      </div>

      <div class="control-group account-form">
        <label class="control-label" for="paypal_expire_year">Expiration year*</label>

        <div class="controls">
          <select class="form-control" name="paypal[expire_year]" id="paypal_expire_year">
            <?= Model_Paypal::selectExpireYears($paypal->expire_year) ?>
          </select>
        </div>
      </div>

      <div class="control-group account-form">
        <div class="controls">
          <input type="submit" class="btn btn-default marg-top" name="submitted" value="Checkout with paypal">
          <p>Pricing plan: $<?= $professional->getPrice() ?>/month</p>
        </div>
      </div>


      <script type="text/javascript">
        $('#checkout_form').submit(function(e) {
          if (confirm('Please confirm to proceed with checkout')) {
            return true;
          } // if

          e.preventDefault();
        });

        // automatic plan renewal ajax
        $('#automatic_plan_renewal').change(function(e) {
          var checkbox = $(this);

          var toggle_check_plan = function() {
            ajax_loader = $('<img alt="loading" id="ajax_loader" src="/assets/img/ajax_loader.gif" />');
            checkbox.hide().after(ajax_loader);
            $.ajax({
              type : 'post',
              data : {
                'checked' : + checkbox.prop('checked')
              },
              url : 'account/renewal',
              success : function() {
                ajax_loader.remove();
                checkbox.show();
              } // success
            });
          }; // toggle_check_plan

          if (checkbox.prop('checked')) {
            if (confirm('Enable automatic plan renewal?')) {
              toggle_check_plan();
            } else {
              checkbox.prop('checked', false);
            } // if
          } else {
            if (confirm('Disable automatic plan renewal?')) {
              toggle_check_plan();
            } else {
              checkbox.prop('checked', true);
            } // if
          } // if
        });
      </script>

      <?= Form::close() ?>
    <?php } ?>

<!--    client data-->
    <?php if ($user->group == Model_User::CLIENT_GROUP_ID) { ?>
      <div class="content">
        <p>Email: <?= $client->getUser()->email ?></p>
        <?= Form::open(array('action' => 'client/'.$client->id.'/edit', 'class' => 'form-horizontal', 'id' => 'client_form')) ?>
        <div class="control-group account-form">
          <div class="controls">
            <label class="control-label">Gender: </label>
            <label class="control-label" for="gender_male">Male </label>

            <input type="radio" class="" name="client_data[gender]"
              <?php if ($client->gender == Model_Client::CLIENT_MALE) { ?> checked="checked" <?php } ?>
                   id="gender_male" value="<?= Model_Client::CLIENT_MALE?>" />

            <label class="control-label" for="gender_female">Female </label>

            <input type="radio" class="" name="client_data[gender]"
              <?php if ($client->gender == Model_Client::CLIENT_FEMALE) { ?> checked="checked" <?php } ?>
                   id="gender_female" value="<?= Model_Client::CLIENT_FEMALE?>" />

          </div>
        </div>
        <div class="control-group account-form male">
          <label class="control-label" for="neck">Neck</label>
          <div class="controls">
            <input type="text" class="form-control" name="client_data[neck]" id="neck" value="<?= $client->neck?>">
          </div>
        </div>
        <div class="control-group account-form male">
          <label class="control-label" for="neck">Arm</label>
          <div class="controls">
            <input type="text" class="form-control" name="client_data[arm]" id="arm" value="<?= $client->arm?>">
          </div>
        </div>
        <div class="control-group account-form male">
          <label class="control-label" for="over_arm">Over Arm</label>
          <div class="controls">
            <input type="text" class="form-control" name="client_data[over_arm]" id="over_arm" value="<?= $client->over_arm?>">
          </div>
        </div>
        <div class="control-group account-form male">
          <label class="control-label" for="chest">Chest</label>
          <div class="controls">
            <input type="text" class="form-control" name="client_data[chest]" id="chest" value="<?= $client->chest?>">
          </div>
        </div>
        <div class="control-group account-form female">
          <label class="control-label" for="bust">Bust</label>
          <div class="controls">
            <input type="text" class="form-control" name="client_data[bust]" id="bust" value="<?= $client->bust?>">
          </div>
        </div>
        <div class="control-group account-form female">
          <label class="control-label" for="hips">Hips</label>
          <div class="controls">
            <input type="text" class="form-control" name="client_data[hips]" id="hips" value="<?= $client->hips?>">
          </div>
        </div>
        <div class="control-group account-form female">
          <label class="control-label" for="cup_size">Cup Size</label>
          <div class="controls">
            <input type="text" class="form-control" name="client_data[cup_size]" id="cup_size" value="<?= $client->cup_size?>">
          </div>
        </div>
        <div class="control-group account-form female">
          <label class="control-label" for="dress_size">Dress Size</label>
          <div class="controls">
            <input type="text" class="form-control" name="client_data[dress_size]" id="dress_size" value="<?= $client->dress_size?>">
          </div>
        </div>
        <div class="control-group account-form">
          <label class="control-label" for="waist">Waist</label>
          <div class="controls">
            <input type="text" class="form-control" name="client_data[waist]" id="waist" value="<?= $client->waist?>">
          </div>
        </div>
        <div class="control-group account-form">
          <label class="control-label" for="glove">Glove</label>
          <div class="controls">
            <input type="text" class="form-control" name="client_data[glove]" id="glove" value="<?= $client->glove?>">
          </div>
        </div>
        <div class="control-group account-form">
          <label class="control-label" for="hat">Hat</label>
          <div class="controls">
            <input type="text" class="form-control" name="client_data[hat]" id="hat" value="<?= $client->hat?>">
          </div>
        </div>
        <div class="control-group account-form">
          <label class="control-label" for="shirt_size">Shirt Size</label>
          <div class="controls">
            <input type="text" class="form-control" name="client_data[shirt_size]" id="shirt_size" value="<?= $client->shirt_size?>">
          </div>
        </div>
        <div class="control-group account-form">
          <label class="control-label" for="age">Age</label>
          <div class="controls">
            <input type="text" class="form-control" name="client_data[age]" id="age" value="<?= $client->age?>">
          </div>
        </div>
        <div class="control-group account-form">
          <label class="control-label" for="height">Height</label>
          <div class="controls">
            <input type="text" class="form-control" name="client_data[height]" id="height" value="<?= $client->height?>">
          </div>
        </div>
        <div class="control-group account-form">
          <label class="control-label" for="weight">Weight</label>
          <div class="controls">
            <input type="text" class="form-control" name="client_data[weight]" id="weight" value="<?= $client->weight?>">
          </div>
        </div>

        <div class="control-group account-form">
          <div class="controls">
            <input type="submit" class="btn btn-default marg-top" name="submitted" value="Save client data">
          </div>
        </div>

        <script type="text/javascript">
          function toggle_inputs(gender) {
            if (gender == 0) {
              // female
              $('div.male').hide();
              $('div.female').show();
            } else {
              // male
              $('div.male').show();
              $('div.female').hide();
            } // if
          } // toggle_inputs

          var gender = '<?= $client->gender ?>';
          toggle_inputs(gender);
          $('#client_form').find('input[type=radio]').change(function() {
            toggle_inputs($(this).val());
          });

        </script>
        <?= Form::close() ?>

      </div>
    <?php } ?>
  </div>
</div>

<script type="text/javascript">
  // receive notifications ajax
  $('#receive_notifications').change(function(e) {
    var checkbox = $(this);

    var toggle_check_notifications = function() {
      ajax_loader = $('<img alt="loading" id="ajax_loader" src="/assets/img/ajax_loader.gif" />');
      checkbox.hide().after(ajax_loader);
      $.ajax({
        type : 'post',
        data : {
          'checked' : + checkbox.prop('checked')
        },
        url : 'account/notifications',
        success : function() {
          ajax_loader.remove();
          checkbox.show();
        } // success
      });
    }; // toggle_check_notifications

    if (checkbox.prop('checked')) {
      if (confirm('Enable receiving notifications?')) {
        toggle_check_notifications();
      } else {
        checkbox.prop('checked', false);
      } // if
    } else {
      if (confirm('Disable receiving notifications?')) {
        toggle_check_notifications();
      } else {
        checkbox.prop('checked', true);
      } // if
    } // if
  });
</script>