	<h4>
		<h4 class="header-underline"><?= $user->has_password() ? 'Change Password' : 'Choose Password' ?></h4>
		
		<?= Form::open(array('class' => 'form-horizontal')) ?>
			<div class="control-group">
				<div class="controls">
					<a href="/account">Back to My Account</a>
				</div>
			</div>

			<?php if ($user->has_password()): ?>

			<div class="control-group">
				<label class="control-label" for="inputPassword">Current Password:</label>
				<div class="controls">
					<input name="current" type="password" id="inputPassword" placeholder="Password">
				</div>
			</div>

			<?php endif; ?>
			
			<div class="control-group">
				<label class="control-label" for="inputPassword">New Password:</label>
				<div class="controls">
					<input name="new" type="password" id="inputPassword" placeholder="Password">
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="inputPassword">Confirm Password:</label>
				<div class="controls">
					<input name="confirm" type="password" id="inputPassword" placeholder="Password">
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<button class="btn">Change Password</button>
				</div>
			</div>

		</form>