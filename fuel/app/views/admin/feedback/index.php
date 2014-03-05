		<table class="table table-striped">
			<thead>
				<tr>
					<th>user_id</th>
					<th>user_email</th>
					<th>referral_url</th>
					<th>feedback</th>
					<th>time</th>
				</tr>
			</thead>
			
			<tbody>
				<?php foreach ($feedbacks as $feedback): ?>
				<tr>
					<td><?= ! empty($feedback->user_id) ? Html::anchor("admin/accounts/view/{$feedback->user_id}", $feedback->user_id) : null ?></td>
					<td><?= Html::mail_to("{$feedback->user_email}", $feedback->user_email) ?></td>
					<td><a href="<?= $feedback->referral_url ?>" target="_blank"><?= $feedback->referral_url ?></a></td>
					<td><?= $feedback->feedback ?></td>
					
					<td>
						<?= $feedback->date("d M Y") ?><br>
						<?= $feedback->date("H:i:s e") ?>
					</td>

				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>