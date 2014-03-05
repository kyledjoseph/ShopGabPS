		<h2>Landing page subscribers</h2>

		<?php if (empty($subscribers)): ?>

		<p>no subscribers</p>

		<?php else: ?>

		<table class="table table-striped">
			<thead>
				<tr>
					<th>email</th>
					<th>date</th>
				</tr>
			</thead>

		<?php foreach ($subscribers as $subscriber): ?>

			<tbody>
				<tr>
					<td><?= $subscriber->email ?></td>
					<td><?= $subscriber->date() ?></td>
				</tr>
			</tbody>

		<?php endforeach; ?>

		</table>



		<textarea>
		<?php foreach ($subscribers as $subscriber): ?>
		<?= $subscriber->email ?>, 
		<?php endforeach; ?>
		</textarea>

		<?php endif; ?>