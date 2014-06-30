<ul class="breadcrumb">
  <li><?= Html::anchor('admin/accounts', 'Accounts') ?></li>
  <li><?= Html::anchor("admin/accounts/view/{$account->id}", $account->display_name()) ?></li>
  <li class="active">Edit Professional Pricing Data</li>
</ul>

<h2><?= $account->display_name() ?></h2>
<hr>

<h2>Professional Pricing Data</h2>
<!--      professional payment data-->
<?= Form::open(array('class' => 'form-horizontal')) ?>
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
    <input type="submit" class="btn btn-default marg-top" name="submitted" value="Edit pricing data">
  </div>
</div>
<?= Form::close() ?>