<div>
  <h3>Config options</h3>
  <table class="table table-striped">
    <tr>
      <th>Name</th>
      <th>Value</th>
      <th></th>
    </tr>
  <?php foreach(configOptions() as $name => $value) {?>
    <tr>
      <td><?= $name ?></td>
      <td><?= $value ?></td>
      <td><?= Html::anchor("admin/config/{$name}", 'edit') ?></td>
    </tr>
  <?php } ?>
  </table>
</div>