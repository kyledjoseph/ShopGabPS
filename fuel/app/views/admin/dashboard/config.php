<div>
  <h3>Edit config option</h3>
  <?= Form::open() ?>
  <table class="table table-striped">
    <tbody>
    <tr>
      <td>Name</td>
      <td><?= $config_name ?></td>
    </tr>

    <tr>
      <td>Value</td>
      <td><input type="text" name="config_value" value="<?= $config_value ?>" /></td>
    </tr>
    </tbody>
  </table>
  <button type="submit" class="btn">Update Config Option</button>
  <?= Form::close() ?>
</div>