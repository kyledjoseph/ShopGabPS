

		<h2><?= Html::anchor('admin/accounts', 'accounts') ?> &gt; <?= $user->display_name() ?></h2>

		<br>

		<p>authenticated with
			<?php if ($user->has_password()): ?> | email<?php endif; ?>
			<?php foreach ($user->user_authentications() as $network): ?> | <?= $network->provider ?><?php endforeach; ?>
		</p>

		<br>

		<table class="table table-striped">

			<tbody>
				<tr>
					<td>email</td>
					<td><?= Html::anchor("admin/accounts/view/{$user->id}", $user->email) ?></td>
				</tr>

				<tr>
					<td>member since</td>
					<td><?= $user->member_since() ?></td>
				</tr>

			</tbody>


		</table>