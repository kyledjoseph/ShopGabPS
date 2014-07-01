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
    <label class="control-label" for="paypal_last_name">Monthly price($) *</label>

    <div class="controls">
      <input type="text" class="form-control" name="price" id="paypal_last_name" value="<?= $professional->getPrice() ?>" required="">
    </div>
  </div>

  <div class="control-group account-form">
    <div class="controls">
      <input type="submit" class="btn btn-default marg-top" name="submitted" value="Edit pricing data">
    </div>
  </div>
<?= Form::close() ?>