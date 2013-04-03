	
	<h2>My Account</h2>
	<hr>

	<?= Form::open(['class' => 'form-horizontal']) ?>

		<div class="control-group">
			<label class="control-label" for="name">Name</label>
			<div class="controls">
				<input type="text" id="name" name="name" placeholder="">
			</div>
		</div>
		

		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn">Save</button>
			</div>
		</div>

	<?= Form::close() ?>