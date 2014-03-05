
		<ul class="breadcrumb">
			<li><?= Html::anchor('admin/accounts', 'Accounts') ?> <span class="divider">/</span></li>
			<li><?= Html::anchor("admin/accounts/view/{$account->id}", $account->display_name()) ?> <span class="divider">/</span></li>
			<li class="active">Edit</li>
		</ul>

		<h2><?= $account->display_name() ?></h2>
		<hr>

		<h2>Account Information</h2>
		<?= Form::open() ?>
		<table class="table table-striped">
			<tbody>
				<tr>
					<td>email</td>
					<td><?= Html::anchor("admin/accounts/view/{$account->id}", $account->email) ?></td>
				</tr>

				<tr>
					<td>display name</td>
					<td><?= Form::input('display_name', $account->display_name()) ?></td>
				</tr>
			</tbody>
		</table>
		<button type="submit" class="btn">Update Account</button>
		<?= Form::close() ?>