
		<h2>accounts</h2>

		<?php if (empty($users)): ?><p>no accounts to display</p><?php else: ?>

		<table class="table table-striped">
			<thead>
				<tr>
					<th>user</th>
					<th>email</th>
					<th>member since</th>
				</tr>
			</thead>

		<?php foreach ($users as $user): ?>

			<tbody>
				<tr>
					<td><?= Html::anchor("admin/accounts/view/{$user->id}", $user->email) ?></td>
					<td><?= $user->email ?></td>
					<td><?= $user->member_since() ?></td>
				</tr>
			</tbody>

		<?php endforeach; ?>

		</table>

		<?php endif; ?>