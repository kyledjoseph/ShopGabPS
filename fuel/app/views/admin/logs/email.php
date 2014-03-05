		<table class="table table-striped">
			<thead>
				<tr>
					<th>type</th>
					<th>to</th>
					<th>from</th>
					<th>message</th>
					<th>date</th>
				</tr>
			</thead>
			
			<tbody>
				<?php foreach ($emails as $email): ?>
				<tr>
					<td><?= $email->type ?></td>
					<td>
						&lt;<?= $email->to_name ?>&gt;<br>
						<?= $email->to_addr ?>
					</td>
					<td>
						&lt;<?= $email->from_name ?>&gt;<br>
						<?= $email->from_addr ?>
					</td>
					<td>
						<?= Html::anchor('#', $email->subject) ?>
					</td>
					<td>
						<?= $email->date("d M Y") ?><br>
						<?= $email->date("H:i:s e") ?>
					</td>

				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>