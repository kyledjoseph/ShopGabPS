
		<ul class="breadcrumb">
			<li><?= Html::anchor('admin/admins', 'Admins') ?></li>
			<li class="active"><?= $admin->user->display_name() ?></li>
		</ul>

		<h2><?= $admin->user->display_name() ?></h2>
		<hr>
	
		<p>
			<?= Html::anchor("admin/accounts/edit/{$admin->user->id}", 'edit this account', array('class' => 'btn btn-primary')) ?>
			<?= Html::anchor("admin/admins/remove/{$admin->user->id}", 'revoke admin permissions', array('class' => 'btn btn-danger')) ?>
			<?= Html::anchor("admin/accounts/delete/{$admin->user->id}", 'delete this account', array('class' => 'btn btn-danger')) ?>
		</p>
		<hr>

		<h2>Admin Account Information</h2>
		<table class="table table-striped">
			<tbody>
				<tr>
					<td>email</td>
					<td><?= Html::mail_to($admin->user->email) ?></td>
				</tr>

				<tr>
					<td>display name</td>
					<td><?= $admin->user->display_name() ?></td>
				</tr>

				<tr>
					<td>member since</td>
					<td><?= $admin->user->member_since() ?></td>
				</tr>

				<tr>
					<td>last login</td>
					<td><?= $admin->user->last_login() ?></td>
				</tr>
			</tbody>
		</table>
		<hr>