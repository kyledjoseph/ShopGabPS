
	<h2>products &gt; index</h2>
	<?= Html::anchor('admin/products/add', 'add product') ?>

	<hr>

	<?php if (empty($products)):  ?>
	<p>no products to display</p>
	<?php else: ?>


	<table class="table table-striped">
		<thead>
			<tr>
				<th>Name</th>
        <th>Price</th>
        <th>Link</th>
			</tr>
		</thead>

	<?php foreach ($products as $product): ?>

		<tbody>
			<tr>
				<td><?= Html::anchor("admin/products/view/{$product->id}", $product->name) ?></td>
        <td><?= $product->price ?></td>
        <td><?= Html::anchor($product->url, $product->url, ['target' => '_blank']) ?></td>
			</tr>
		</tbody>

	<?php endforeach; ?>

	</table>

	<?php endif; ?>