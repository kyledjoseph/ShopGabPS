

	<h2>products &gt; view</h2>
	<?= Html::anchor('admin/products', 'back to index') ?>
	<hr>

  <h2>Product Information</h2>
  <table class="table table-striped">
    <tbody>
    <tr>
      <td>Name</td>
      <td><?= $product->name ?></td>
    </tr>

    <tr>
      <td>Price</td>
      <td><?= $product->price ?></td>
    </tr>

    <tr>
      <td>Link</td>
      <td><?= Html::anchor($product->url, $product->url, ['target' => '_blank']) ?></td>
    </tr>

    <tr>
      <td>Added For</td>
      <td><?= Html::anchor("admin/accounts/view/{$product->getAddedFor()->id}", $product->getAddedFor()->display_name()) ?></td>
    </tr>

    <tr>
      <td>Added By</td>
      <td><?= Html::anchor("admin/accounts/view/{$product->getAddedBy()->id}", $product->getAddedBy()->display_name()) ?></td>
    </tr>
    </tbody>
  </table>

  <h2>Product Image</h2>
  <div>
    <img src="<?= $product->image_url(250, 220) ?>" />
  </div>