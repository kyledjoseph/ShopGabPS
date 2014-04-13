<div class="row">
  <div class="col-12">
    <h2>Quests:</h2>
  </div>
  <div class="col-12">
    <div class="row">
      <div class="col-12 col-sm-8">
        <div class="row">
          <div class="col-12 col-sm-8 pad-top">
            <select class="dash-search-select form-control">
              <option disabled selected>Sort By Recent Updates</option>
            </select>
          </div>
          <div class="col-12 col-sm-4 pad-top">
            <button href="#questModal" class="btn btn-success pull-right" data-container="body" data-placement="top" data-original-title="" title="" data-toggle="modal">Start a new Quest!</button>
          </div>
        </div>
        <div class="row pad-top">
          <div class="col-12"
            <div class="row product-rows">
              <?php foreach ($quests as $quest): ?>
                <div class="col-12 col-sm-4 col-lg-3 dash-product-square">
                  <div class="added-by">&nbsp;</div>
                  <a href="<?= Uri::create($quest->url()) ?>" class="dash-product-image-div" style="background-image:url(<?= $quest->default_thumb_url(250, 220) ?>)">
                    <div class="product-name"><?= $quest->name() ?></div>
                      <span class="close dash-close"><span class="badge"><?= $quest->total_unseen_notifications() ?></span>
                  </a>
                </div>
              <?php endforeach; ?>
              <div class="col-12 col-sm-4 col-lg-3 dash-product-square no">
                <div class="added-by">
                  &nbsp;
                </div>
                <a style="border: 2px dashed #aaa; background-image:url(/assets/img/add-quest.png)" href="#questModal" class="dash-product-image-div" data-toggle="modal">
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-4 pad-top">
          <div class="box my_clients">
            <h4><img class="force-32-32" src="<?= $client->getUser()->get_avatar_uri() ?>" /> <?= $client->getUser()->display_name() ?></h4>
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
                  <label class="control-label" for="professional_information">Client Information</label>
                  <div class="controls">
                    <textarea class="form-control" name="client_data[professional_information]" id="professional_information"><?= $client->professional_information ?></textarea>
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
          </div>
        </div>
      </div>
    </div>
  </div>
</div>