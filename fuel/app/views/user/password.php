
		<ul class="breadcrumb">
			<li><?= Html::anchor('/', 'Dashboard') ?> <span class="divider">/</span></li>
			<li><?= Html::anchor('account', 'My Account') ?> <span class="divider">/</span></li>
			<li class="active">Change Password</li>
		</ul>
		
		<?= Form::open(array('class' => 'form-horizontal')) ?>
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

			<button class="btn">Change Password</button>
		</form>