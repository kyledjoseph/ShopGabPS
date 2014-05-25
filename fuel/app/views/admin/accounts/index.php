
		<h2>accounts</h2>

		<?php if (empty($accounts)): ?><p>no accounts to display</p><?php else: ?>

		<table class="table table-striped">
			<thead>
				<tr>
					<th>display_name</th>
					<th>email</th>
          <th>user type</th>
					<th>member since</th>
          <th>last seen on</th>
				</tr>
			</thead>

		<?php foreach ($accounts as $account): ?>

			<tbody>
				<tr>
					<td><?= Html::anchor("admin/accounts/view/{$account->id}", $account->display_name()) ?></td>
					<td><?= $account->email ?></td>
          <td><?= $account->getVerboseAccountType() ?></td>
					<td><?= $account->member_since() ?></td>
          <td><?= $account->last_login() ?></td>
				</tr>
			</tbody>

		<?php endforeach; ?>

		</table>

		<?php endif; ?>