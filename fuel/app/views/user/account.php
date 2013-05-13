	
	<section id="main-section">

		<h1>My Account</h1>

		<?= Form::open(['class' => 'form-horizontal']) ?>
			<ul>
				<li>
					<label for="name">Name</label>
					<input type="text" name="name" placeholder="" value="<?= $user->display_name() ?>">
				</li>
				<li>
					<label for="email">Email</label>
					<input type="text" name="email" placeholder="" value="<?= $user->email ?>">
				</li>
				<li>
					<label for="password">Password</label>
					<?= Html::anchor('user/password', 'Change Password') ?>
				</li>

				<li>
					<label for="name">Facebook</label>
					<?php if ($user->is_authenticated_with('facebook')): ?>
						Authenticated
					<?php else: ?>
						<?php // Html::anchor('user/auth/facebook', 'Connect with Facebook') ?>
					<?php endif; ?>
				</li>
			</ul>
			
				<button type="submit" class="btn green2">Update My Account</button>

		<?= Form::close() ?>
