<div class="row">
  <div class="col-12 col-sm-6">
    <h2 class="header-underline">My Account</h2>

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
  <div class="col-12 col-sm-6">sdfsdf</div>
</div>
