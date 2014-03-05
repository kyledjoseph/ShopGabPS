
		<h2>admins</h2>

		<?php if (empty($admins)): ?><p>no admins to display</p><?php else: ?>

		<table class="table table-striped">
			<thead>
				<tr>
					<th>display_name</th>
					<th>email</th>
				</tr>
			</thead>

		<?php foreach ($admins as $admin): ?>

			<tbody>
				<tr>
					<td><?= Html::anchor($admin->admin_url(), $admin->user->display_name()) ?></td>
					<td><?= $admin->user->email ?></td>
				</tr>
			</tbody>

		<?php endforeach; ?>

		</table>

		<?php endif; ?>

		<?= Form::open(array('action' => 'admin/admins/add')) ?>
			<input type="text" name="email" placeholder="email address">
			<button type="submit">Add Admin</button>
		<?= Form::close() ?>