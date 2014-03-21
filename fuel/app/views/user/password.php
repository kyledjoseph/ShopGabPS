<div class="container">
<div class="col-12 col-sm-4">
		<h2 class="header-underline">Change Password</h2>
		
		<?= Form::open(array('class' => 'form-horizontal')) ?>
			<div class="control-group">
				<div class="controls">
					<a href="/account">Back to My Account</a>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputPassword">Current Password:</label>
				<div class="controls">
					<input name="current" class="form-control" type="password" id="inputPassword" placeholder="Password">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="inputPassword">New Password:</label>
				<div class="controls">
					<input name="new" class="form-control" type="password" id="inputPassword" placeholder="Password">
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="inputPassword">Confirm Password:</label>
				<div class="controls">
					<input name="confirm" class="form-control" type="password" id="inputPassword" placeholder="Password">
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<button class="btn btn-default marg-top">Change Password</button>
				</div>
			</div>

		</form>
	</div>
</div>