
	<h2>products &gt; index</h2>
	<?= Html::anchor('admin/products/add', 'add product') ?>

	<hr>

	<?php if (empty($products)):  ?>
	<p>no products to display</p>
	<?php else: ?>


	<table class="table table-striped">
		<thead>
			<tr>
				<th>name</th>
				<th>brand</th>
			</tr>
		</thead>

	<?php foreach ($products as $product): ?>

		<tbody>
			<tr>
				<td><?= Html::anchor("admin/products/view/{$product->id}", $product->name) ?></td>
				<td><?= $product->brand ?></td>
			</tr>
		</tbody>

	<?php endforeach; ?>

	</table>

	<?php endif; ?>