	
	<h2>My Account</h2>
	<hr>

	<?= Form::open(['class' => 'form-horizontal']) ?>

		<div class="control-group">
			<label class="control-label" for="name">Current Password</label>
			<div class="controls">
				<input type="text" name="current">
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="email">New Password</label>
			<div class="controls">
				<input type="text" name="new">
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="email">Confirm New Password</label>
			<div class="controls">
				<input type="text" name="confirm">
			</div>
		</div>

		
		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn">Update Password</button>
			</div>
		</div>

	<?= Form::close() ?>
