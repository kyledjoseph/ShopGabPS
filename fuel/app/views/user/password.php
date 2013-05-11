	
	<section id="main-section">

		<h1>Change My Password</h1>

		<?= Form::open(['class' => 'form-horizontal']) ?>

		<ul>
			<li>
				<label for="name">Current Password</label>
				<input type="text" name="current">
			</li>
			<li>
				<label for="email">New Password</label>
				<input type="text" name="new">
			</li>
			<li>
				<label for="email">Confirm New Password</label>
				<input type="text" name="confirm">
			</li>
		</ul>
					
		<button type="submit" class="btn green2">Update Password</button>


		<?= Form::close() ?>
