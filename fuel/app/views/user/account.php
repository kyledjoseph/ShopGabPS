<div class="row page-inner page-profile">
  <div class="sidebar">
    
    <div id="main-profile">
      <div class='main-profile-img'>
        <img class="force-150-150" src="<?= $user->get_avatar_uri(200,200) ?>" />
      </div>
      <div class='main-profile-name'>
        <div><?= $user->display_name() ?></div>        
      </div>
      <div class='main-profile-user-type'>
        <div><?= $user->getVerboseAccountType() ?></div>
      </div>
      <div class='main-profile-info'>
        <div>PSID: <span><?= $user->id ?></span></div>
      </div>      
    </div>

    <ul id="profile-tabs">
      <li class='active'><a class="profile" href="#profile" data-toggle="tab">Profile</a></li>
      <li>
        
          <?php if ($user->group == Model_User::PROFESSIONAL_GROUP_ID) { ?>
            <a class='billing' href="#billing" data-toggle="tab">
              Billing
            </a>
          <?php } ?>
          <?php if ($user->group == Model_User::CLIENT_GROUP_ID) { ?>
            <a class='measurements' href="#billing" data-toggle="tab">
              Measurements
            </a> 
          <?php } ?>
       
      </li>
      <li><a class='settings' href="#settings" data-toggle="tab">Settings</a></li>
    </ul>

  </div>

  <div class="content">
    <div class="tab-content">
      
      <!-- Profile tab -->
      <section class="tab-pane active" id="profile">

        <h1>Profile</h1>
        <h3 class="header-underline">Profile Information</h3>
        <div class='wrapp'>
          <div class="form-group inline"><label>User type:</label><span><?= $user->getVerboseAccountType() ?></span></div>
          <?php if ($professional) { ?>         
            <div class="form-group inline"><label>Pricing plan:</label><span><?= $professional->getVerbosePricingPlanType() ?></span></div>
            <div class="form-group inline"><label>Pricing plan:</label><span>$<?= $professional->getPrice() ?>/month</span></div>
            <input class='check' type="checkbox" id="automatic_plan_renewal" <?php if ($professional->automatic_plan_renewal) { ?> checked="checked" <?php } ?> />
            <label>Automatic plan renewal</label>            
          <?php } ?>
        </div>
        
        <h3 class="header-underline">Profile Information</h3>
        <div class='wrapp'>
          <?= Form::open(array()) ?>
          <div class="control-group account-form form-group">
            <label class="control-label" for="name">Name:</label>
            <div class="controls">
              <input type="text" class="form-control" name="name" id="inputName" placeholder="John Smith"
                     value="<?= $user->display_name() ?>">
            </div>
          </div>
          <div class="control-group account-form form-group">
            <label class="control-label" for="email">Email:</label>

            <div class="controls">
              <input type="text" class="form-control" name="email" id="inputEmail" placeholder="Email"
                     value="<?= $user->email ?>">
            </div>
          </div>
          <div class="control-group account-form form-group">
            <div class="controls">
              <button class="btn btn-default">Update Account</button>
            </div>
          </div>
          <?= Form::close() ?>
        </div>

        <h3 class="header-underline">Profile Picture</h3>
        <div class='wrapp'>
          <?= Form::open(array('action' => 'account/avatar', 'enctype' => 'multipart/form-data')) ?>
          <div class="control-group account-form form-group">
            <div class="controls profile-img">
              <img src="<?= $user->get_avatar_uri(200,200) ?>" />

            </div>

            <div class="controls">
              <input class="avatar-upload" type="file" name="avatar" id="avatar"/>
            </div>
          </div>

          <div class="control-group account-form form-group">
            <div class="controls">
              <button class="btn btn-default">Upload Picture</button>
            </div>
          </div>
          <?= Form::close() ?>
        </div>

        <?php if ($professional) { ?>
          <h3 class="header-underline">Professional Logo</h3>
          <div class='wrapp'>
            <?= Form::open(array('action' => 'account/logo', 'enctype' => 'multipart/form-data', 'class' => '')) ?>
            <div class="control-group account-form form-group">
              <label class="control-label" for="inputName"></label>

              <div class="controls">
                <img class="" src="<?= $professional->get_logo_uri() ?>" />
              </div>
              <div class="controls">
                <input class="avatar-upload" type="file" name="logo" id="logo"/>
              </div>
            </div>

            <div class="control-group account-form form-group">
              <div class="controls" profile-img>
                <button class="btn btn-default">Upload Logo (120px x 60px)</button>
              </div>
            </div>
            <?= Form::close() ?>  
          </div>        
        <?php } ?>

      </section>

      <!-- Billing tab -->
      <section class="tab-pane" id="billing">            
            <?php if ($user->group == Model_User::PROFESSIONAL_GROUP_ID) { ?>
        <!--      professional payment data-->

            <h1>Billing</h1>

            <?= Form::open(array('action' => 'account/paypal', 'id' => 'checkout_form')) ?>
              <h3 class="header-underline">Personal Info</h3>
              <div class='wrapp'>
               
                  <div class="control-group form-group account-form">
                    <label class="control-label" for="paypal_first_name">First Name*</label>

                    <div class="controls">
                      <input type="text" class="form-control" name="paypal[first_name]" id="paypal_first_name" value="<?= $paypal->first_name?>" required="">
                    </div>
                  </div>
                  <div class="control-group form-group account-form">
                    <label class="control-label" for="paypal_last_name">Last Name*</label>

                    <div class="controls">
                      <input type="text" class="form-control" name="paypal[last_name]" id="paypal_last_name" value="<?= $paypal->last_name?>" required="">
                    </div>
                  </div>
                  <div class="control-group form-group account-form">
                    <label class="control-label" for="paypal_company">Company</label>

                    <div class="controls">
                      <input type="text" class="form-control" name="paypal[company]" id="paypal_company" value="<?= $paypal->company?>">
                    </div>
                  </div>
                  <div class="control-group form-group account-form">
                    <label class="control-label" for="paypal_email">Email Address*</label>

                    <div class="controls">
                      <input type="email" class="form-control" name="paypal[email]" id="paypal_email" value="<?= $paypal->email?>" required="">
                    </div>
                  </div>
                  <div class="control-group form-group account-form">
                    <label class="control-label" for="paypal_address">Address*</label>

                    <div class="controls">
                      <input type="text" class="form-control" name="paypal[address]" id="paypal_address" value="<?= $paypal->address?>" required="">
                    </div>
                  </div>
                  <div class="control-group form-group account-form">
                    <label class="control-label" for="paypal_city">City*</label>

                    <div class="controls">
                      <input type="text" class="form-control" name="paypal[city]" id="paypal_city" value="<?= $paypal->city?>" required="">
                    </div>
                  </div>
                  <div class="control-group form-group account-form">
                    <label class="control-label" for="paypal_zip_postal_code">Zip/Postal Code*</label>

                    <div class="controls">
                      <input type="text" class="form-control" name="paypal[zip_postal_code]" id="paypal_zip_postal_code" value="<?= $paypal->zip_postal_code?>" required="">
                    </div>
                  </div>
                  <div class="control-group form-group account-form">
                    <label class="control-label" for="paypal_state_province">State/Province*</label>

                    <div class="controls">
                      <select class="form-control" name="paypal[state_province]" id="paypal_state_province">
                        <?= Model_Paypal::selectListOfStates($paypal->state_province) ?>
                      </select>
                    </div>
                  </div>
                  <div class="control-group form-group account-form">
                    <label class="control-label" for="paypal_country">Country*</label>

                    <div class="controls">
                      <select class="form-control" name="paypal[country]" id="paypal_country">
                        <?= Model_Paypal::selectListOfCountries($paypal->country) ?>
                      </select>
                    </div>
                  </div>
                  <div class="control-group form-group account-form">
                    <label class="control-label" for="paypal_telephone">Telephone*</label>

                    <div class="controls">
                      <input type="text" class="form-control" name="paypal[telephone]" id="paypal_telephone" value="<?= $paypal->telephone?>" required="">
                    </div>
                  </div>
              </div> <!-- wrapp -->

              <h3 class="header-underline">Credit Card Information</h3>
              <div class='wrapp'>
                <div class="control-group form-group account-form">
                  <label class="control-label" for="paypal_card_type">Credit Card Type*</label>

                  <div class="controls">
                    <select class="form-control" name="paypal[card_type]" id="paypal_card_type">
                      <?= Model_Paypal::selectListOfCCTypes($paypal->card_type) ?>
                    </select>
                  </div>
                </div>

                <div class="control-group form-group account-form">
                  <label class="control-label" for="paypal_card_number">Credit Card Number*</label>

                  <div class="controls">
                    <input type="text" class="form-control" name="paypal[card_number]" id="paypal_card_number" value="<?= $paypal->card_number?>" required="">
                  </div>
                </div>

                <div class="control-group form-group account-form">
                  <label class="control-label" for="paypal_cvv2">CVV2*</label>

                  <div class="controls">
                    <input type="text" class="form-control" name="paypal[cvv2]" id="paypal_cvv2" value="<?= $paypal->cvv2?>" required="" maxlength="4">
                  </div>
                </div>

                <div class="control-group form-group account-form">
                  <label class="control-label" for="paypal_expire_month">Expiration month*</label>

                  <div class="controls">
                    <select class="form-control" name="paypal[expire_month]" id="paypal_expire_month">
                      <?= Model_Paypal::selectExpireMonths($paypal->expire_month) ?>
                    </select>
                  </div>
                </div>

                <div class="control-group form-group account-form">
                  <label class="control-label" for="paypal_expire_year">Expiration year*</label>

                  <div class="controls">
                    <select class="form-control" name="paypal[expire_year]" id="paypal_expire_year">
                      <?= Model_Paypal::selectExpireYears($paypal->expire_year) ?>
                    </select>
                  </div>
                </div>

                <div class="control-group form-group account-form">
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
              </div>
              
              

              <?= Form::close() ?>


            <?php } ?>



        <!--    client data-->
            <?php if ($user->group == Model_User::CLIENT_GROUP_ID) { ?>
              <h1>Measurements</h1>
              <div class="content">
                <!--  <p>Email: 
                <? // $client->getUser()->email ?>
                </p> -->
                <?= Form::open(array('action' => 'client/'.$client->id.'/edit', 'id' => 'client_form')) ?>
                <div class="control-group account-form form-group">
                  <div class="controls">
                    <label class="control-label">Gender: </label>
                    <div class='radio-option'>                      
                      <input type="radio" class="" name="client_data[gender]"
                        <?php if ($client->gender == Model_Client::CLIENT_MALE) { ?> checked="checked" <?php } ?>
                             id="gender_male" value="<?= Model_Client::CLIENT_MALE?>" />
                      <label class="control-label" for="gender_male">Male </label>
                    </div>
                    <div class='radio-option'>
                      <input type="radio" class="" name="client_data[gender]"
                        <?php if ($client->gender == Model_Client::CLIENT_FEMALE) { ?> checked="checked" <?php } ?>
                             id="gender_female" value="<?= Model_Client::CLIENT_FEMALE?>" />
                      <label class="control-label" for="gender_female">Female </label>                      
                    </div>                    
                  </div>
                </div>
                <div class="control-group form-group account-form male">
                  <label class="control-label" for="neck">Neck</label>
                  <div class="controls">
                    <input type="text" class="form-control" name="client_data[neck]" id="neck" value="<?= $client->neck?>">
                  </div>
                </div>
                <div class="control-group account-form form-group male">
                  <label class="control-label" for="neck">Arm</label>
                  <div class="controls">
                    <input type="text" class="form-control" name="client_data[arm]" id="arm" value="<?= $client->arm?>">
                  </div>
                </div>
                <div class="control-group account-form form-group male">
                  <label class="control-label" for="over_arm">Over Arm</label>
                  <div class="controls">
                    <input type="text" class="form-control" name="client_data[over_arm]" id="over_arm" value="<?= $client->over_arm?>">
                  </div>
                </div>
                <div class="control-group account-form form-group male">
                  <label class="control-label" for="chest">Chest</label>
                  <div class="controls">
                    <input type="text" class="form-control" name="client_data[chest]" id="chest" value="<?= $client->chest?>">
                  </div>
                </div>
                <div class="control-group account-form form-group female">
                  <label class="control-label" for="bust">Bust</label>
                  <div class="controls">
                    <input type="text" class="form-control" name="client_data[bust]" id="bust" value="<?= $client->bust?>">
                  </div>
                </div>
                <div class="control-group account-form female form-group">
                  <label class="control-label" for="hips">Hips</label>
                  <div class="controls">
                    <input type="text" class="form-control" name="client_data[hips]" id="hips" value="<?= $client->hips?>">
                  </div>
                </div>
                <div class="control-group account-form female form-group">
                  <label class="control-label" for="cup_size">Cup Size</label>
                  <div class="controls">
                    <input type="text" class="form-control" name="client_data[cup_size]" id="cup_size" value="<?= $client->cup_size?>">
                  </div>
                </div>
                <div class="control-group account-form female form-group">
                  <label class="control-label" for="dress_size">Dress Size</label>
                  <div class="controls">
                    <input type="text" class="form-control" name="client_data[dress_size]" id="dress_size" value="<?= $client->dress_size?>">
                  </div>
                </div>
                <div class="control-group account-form form-group ">
                  <label class="control-label" for="waist">Waist</label>
                  <div class="controls">
                    <input type="text" class="form-control" name="client_data[waist]" id="waist" value="<?= $client->waist?>">
                  </div>
                </div>
                <div class="control-group account-form form-group">
                  <label class="control-label" for="glove">Glove</label>
                  <div class="controls">
                    <input type="text" class="form-control" name="client_data[glove]" id="glove" value="<?= $client->glove?>">
                  </div>
                </div>
                <div class="control-group account-form form-group">
                  <label class="control-label" for="hat">Hat</label>
                  <div class="controls">
                    <input type="text" class="form-control" name="client_data[hat]" id="hat" value="<?= $client->hat?>">
                  </div>
                </div>
                <div class="control-group account-form form-group">
                  <label class="control-label" for="shirt_size">Shirt Size</label>
                  <div class="controls">
                    <input type="text" class="form-control" name="client_data[shirt_size]" id="shirt_size" value="<?= $client->shirt_size?>">
                  </div>
                </div>
                <div class="control-group account-form form-group">
                  <label class="control-label" for="age">Age</label>
                  <div class="controls">
                    <input type="text" class="form-control" name="client_data[age]" id="age" value="<?= $client->age?>">
                  </div>
                </div>
                <div class="control-group account-form form-group">
                  <label class="control-label" for="height">Height</label>
                  <div class="controls">
                    <input type="text" class="form-control" name="client_data[height]" id="height" value="<?= $client->height?>">
                  </div>
                </div>
                <div class="control-group account-form form-group">
                  <label class="control-label" for="weight">Weight</label>
                  <div class="controls">
                    <input type="text" class="form-control" name="client_data[weight]" id="weight" value="<?= $client->weight?>">
                  </div>
                </div>

                <div class="control-group account-form form-group">
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

      </section>

      <!-- Settings tab -->
      <section class="tab-pane" id="settings">
          <h1>Settings</h1>
          <h3 class="header-underline">Notifications</h3>          
          <div class='wrapp'>
            <?= Form::open(array('action' => 'account/notifications')) ?>
            <div class="control-group account-form form-group">
              <div class="controls">
                <input type="checkbox" id="receive_notifications" <?php if ($user->receive_notifications) { ?> checked="checked" <?php } ?> />
                <label for="receive_notifications">Receive notifications</label>
              </div>
            </div>
            <?= Form::close() ?>
          </div>          

          <h3 class="header-underline">Password</h3>
          <div class='wrapp'>
            <?= Form::open() ?>
            <div class="control-group form-group">
              <div class="controls">
                <span class="btn btn-default facebook-account"><?= Html::anchor('account/password', 'Change Password') ?></span>
              </div>
            </div>
            <?= Form::close() ?>
          </div>
          
        </div>
      </section>

    </div>
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