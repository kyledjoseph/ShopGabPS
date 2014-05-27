
	<h2>products &gt; index</h2>

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
        <th>Added For</th>
        <th>Added By</th>
			</tr>
		</thead>

	<?php foreach ($products as $product): ?>

		<tbody>
			<tr>
				<td><?= Html::anchor("admin/products/view/{$product->id}", $product->name) ?></td>
        <td><?= $product->price ?></td>
        <td><?= Html::anchor($product->url, $product->url, ['target' => '_blank']) ?></td>
        <td><?= Html::anchor("admin/accounts/view/{$product->getAddedFor()->id}", $product->getAddedFor()->display_name()) ?></td>
        <td><?= Html::anchor("admin/accounts/view/{$product->getAddedBy()->id}", $product->getAddedBy()->display_name()) ?></td>
			</tr>
		</tbody>

	<?php endforeach; ?>

	</table>

	<?php endif; ?>