		<table class="table table-striped">
			<thead>
				<tr>
					<th>url</th>
					<th>error</th>
					<th>date</th>
				</tr>
			</thead>
			
			<tbody>
				<?php foreach ($errors as $error): ?>
				<tr>
					<td><?= $email->url ?></td>
					<td><?= $email->error ?></td>
					<td>
						<?= $email->date("d M Y") ?><br>
						<?= $email->date("H:i:s e") ?>
					</td>

				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>