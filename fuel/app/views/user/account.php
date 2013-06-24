
		<h4 class="header-underline">My Account</h4>
		
		<?= Form::open(array('class' => 'form-horizontal')) ?>
			<div class="control-group account-form">
				<label class="control-label" for="inputName">Change avatar:</label>
				<div class="controls">
					<input class="avatar-upload" type="file" name="fileToUpload" id="fileToUpload" />
				</div>
			</div>
			<hr>
			
			<div class="control-group account-form">
				<label class="control-label" for="name">Name:</label>
				<div class="controls">
					<input type="text" name="name" id="inputName" placeholder="John Smith" value="<?= $user->display_name() ?>">
				</div>
			</div>
			
			<div class="control-group account-form">
				<label class="control-label" for="email">Email:</label>
				<div class="controls">
					<input type="text" name="email" id="inputEmail" placeholder="Email" value="<?= $user->email ?>">
				</div>
			</div>
			
			<div class="control-group account-form">
				<label class="control-label" for="inputEmail">Facebook:</label>
				<div class="controls">
					<span class="facebook-account"><?= $user->is_authenticated_with('facebook') ? 'Authenticated': Html::anchor('auth/facebook?r=account', 'Login with Facebook') ?></span>
				</div>
			</div>

			<div class="control-group account-form">
				<div class="controls">
					<button class="btn">Update Account</button>
				</div>
			</div>
			<hr />
			
			<div class="control-group">
				<label class="control-label" for="inputPassword">Current Password:</label>
				<div class="controls">
					<span class="facebook-account"><?= Html::anchor('account/password', 'Change Password') ?></span>
				</div>
			</div>

			
			
		</form>