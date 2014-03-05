
		<ul class="breadcrumb">
			<li><?= Html::anchor('admin/accounts', 'Accounts') ?> <span class="divider">/</span></li>
			<li class="active"><?= $account->display_name() ?></li>
		</ul>

		<h2><?= $account->display_name() ?></h2>
		<hr>
	
		<p>
			<?= Html::anchor("admin/accounts/edit/{$account->id}", 'edit this account', array('class' => 'btn btn-primary')) ?>
			<?= Html::anchor("admin/accounts/delete/{$account->id}", 'delete this account', array('class' => 'btn btn-danger')) ?>
		</p>
		<hr>

		<h2>Account Information</h2>
		<table class="table table-striped">
			<tbody>
				<tr>
					<td>email</td>
					<td><?= Html::mail_to($account->email) ?></td>
				</tr>

				<tr>
					<td>authenticated with facebook</td>
					<td><?= $account->is_authenticated_with('facebook') ? 'yes' : 'no' ?></td>
				</tr>

				<tr>
					<td>display name</td>
					<td><?= $account->display_name() ?></td>
				</tr>

				<tr>
					<td>member since</td>
					<td><?= $account->member_since() ?></td>
				</tr>

				<tr>
					<td>last login</td>
					<td><?= $account->last_login() ?></td>
				</tr>
			</tbody>
		</table>
		<hr>

		<h2>User Quests</h2>
		<table class="table table-striped">
			<thead>
				<th>name</th>
				<th>created</th>
				<th>&nbsp;</th>
			</thead>

			<tbody>

				<?php foreach ($account->get_quests() as $quest): ?>
				
				<tr>
					<td><?= Html::anchor($quest->url(), $quest->name) ?></td>
					<td><?= $quest->date() ?></td>
					<td><?= Html::anchor("admin/accounts/delete_quest/{$account->id}/{$quest->id}", 'delete') ?></td>
				</tr>

				<?php endforeach; ?>

			</tbody>
		</table>
