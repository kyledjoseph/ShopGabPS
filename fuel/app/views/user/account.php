<div class="row">
  <div class="col-12 col-sm-6">
    <h2 class="header-underline">My Account</h2>
    <h3 class="header-underline">Profile Information</h3>
    <p>User type: <?= $user->getVerboseAccountType() ?></p>
    <?php if ($professional) { ?>
      <p>Pricing plan: <?= $professional->getVerbosePricingPlanType() ?></p>
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
      </div>
    </div>
    <div class="control-group account-form">
      <div class="controls">
        <button class="btn btn-default marg-top">Update Notifications</button>
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
      <h3 class="header-underline">Billing Info</h3>
      <?= Form::open(array('action' => 'account/paypal', 'class' => 'form-horizontal')) ?>
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
        </div>
      </div>

      <?= Form::close() ?>
    <?php } ?>
  </div>
</div>
