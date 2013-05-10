	
	<h2>My Account</h2>
	<hr>

	<?= Form::open(['class' => 'form-horizontal']) ?>

		<div class="control-group">
			<label class="control-label" for="name">Name</label>
			<div class="controls">
				<input type="text" name="name" placeholder="" value="<?= $user->display_name() ?>">
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="email">Email</label>
			<div class="controls">
				<input type="text" name="email" placeholder="" value="<?= $user->email ?>">
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="password">Password</label>
			<div class="controls">
				<?= Html::anchor('user/password', 'Change Password') ?>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="name">Facebook</label>
			<div class="controls">
				<?php if ($user->is_authenticated_with('facebook')): ?>
					Authenticated
				<?php else: ?>
					<?php // Html::anchor('user/auth/facebook', 'Connect with Facebook') ?>
				<?php endif; ?>
			</div>
		</div>
		
		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn">Update Account</button>
			</div>
		</div>

	<?= Form::close() ?>
