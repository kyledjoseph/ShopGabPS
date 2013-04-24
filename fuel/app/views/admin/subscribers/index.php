		<h2>lists</h2>

		<?php if (empty($lists)): ?>

		<p>no lists</p>

		<?php else: ?>

		<table class="table table-striped">
			<thead>
				<tr>
					<th>name</th>
					<th>id</th>
					<th>members</th>
				</tr>
			</thead>

		<?php foreach ($lists as $list): ?>

			<tbody>
				<tr>
					<td><?= $list->name ?></td>
					<td><?= $list->id ?></td>
					<td><?= $list->stats->member_count ?></td>
				</tr>
			</tbody>

		<?php endforeach; ?>

		</table>

		<br><br><br>

		<h2>list details</h2>
		
		<?php foreach ($lists as $list): ?>
			<h3><?= $list->name ?></h3>
			<pre><?= var_export($list) ?></pre>
			<br>
		<?php endforeach; ?>

		<?php endif; ?>