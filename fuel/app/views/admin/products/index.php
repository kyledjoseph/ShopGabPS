	
	<h2>product index</h2>
	<?= Html::anchor('admin/products/add', 'Add Product') ?>

	<hr>

	<?php if (empty($products)):  ?>
	<p>no products to display</p>
	<?php else: ?>

	<?php foreach ($products as $product): ?>

	<?= Html::anchor("admin/products/view/{$product->id}", $product->name) ?>

	<?php endforeach; ?>
	<?php endif; ?>