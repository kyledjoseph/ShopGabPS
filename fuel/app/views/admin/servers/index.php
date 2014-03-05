		<table class="table table-striped">
			<thead>
				<tr>
					<th>name</th>
					<th>os</th>
					<th>region</th>
					<th>PublicNet</th>
					<th>ServiceNet</th>
					<th>id</th>
				</tr>
			</thead>
			
			<tbody>

				<?php if (Fuel::$env == 'development'): ?>

				<tr>
					<td>localhost</td>
					<td><img src="https://learningnetwork.cisco.com/static/apple%20icon%2020x20.jpg"> OSX 10.7.5</td>
					<td>unknown</td>
					<td><?= Html::anchor('http://dev/itemnation/public', '127.0.0.1') ?></td>
					<td></td>
					<td></td>
				</tr>

				<?php endif; ?>

				<tr>
					<td>alpha</td>
					<td><img src="https://mycloud.rackspace.com/site_media/images/distros/ubuntu-20x20.png"> Ubuntu 12.10</td>
					<td>Dallas</td>
					<td><?= Html::anchor('http://166.78.49.117', '166.78.49.117') ?></td>
					<td><?= Html::anchor('http://10.181.130.148', '10.181.130.148') ?></td>
					<td><?= Html::anchor('https://mycloud.rackspace.com/a/itemnation/#compute%2CcloudServersOpenStack%2CDFW/b709cd9e-742a-404d-b202-5bd3684d1a75', 'b709cd9e-742a-404d-b202-5bd3684d1a75') ?></td>
				</tr>
			</tbody>
		</table>