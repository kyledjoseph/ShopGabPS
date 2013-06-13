	<h4>
		<h4 class="header-underline">Forgot Password</h4>
		
		<?= Form::open(array('class' => 'form-horizontal')) ?>
		<div class="control-group">
				<div class="controls">
					<a href="/account">My Account</a>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputPassword">Current Password:</label>
				<div class="controls">
					<input type="password" id="inputPassword" placeholder="Password">
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="inputPassword">New Password:</label>
				<div class="controls">
					<input type="password" id="inputPassword" placeholder="Password">
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="inputPassword">Confirm Password:</label>
				<div class="controls">
					<input type="password" id="inputPassword" placeholder="Password">
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<button class="btn">Change Password</button>
				</div>
			</div>

			
		</form>