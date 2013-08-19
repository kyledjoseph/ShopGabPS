

	<!-- well -->

	<div id="registerModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Sign Up</h4>
			</div>
			<div class="modal-body">
					<div class="row">
						<div class="col-12 col-sm-6 social-login">
							<?= Html::anchor('auth/facebook?r=' . Uri::string(), Asset::img('facebook-login.png')) ?>
						</div>
						<div class="col-12 col-sm-6 form-login">
					<?= Form::open(array('action' => 'user/register', 'method' => 'post')) ?>
					<div>
						<div class="form-group">
							<label class="control-label" for="name">Full Name</label>
							<input type="text" name="name" id="inputFullName" class="form-control" placeholder="Full Name">
							<span id="error_name" class="modal_error"></span>
						</div>

						<div class="form-group">
							<label class="control-label" for="email">Email</label>
							<input type="text" name="email" id="inputEmail" class="form-control" placeholder="Email">
							<span id="error_email" class="modal_error"></span>
						</div>

						<div class="form-group">
							<label class="control-label" for="password">Password</label>
							<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
						</div>

						<div class="form-group">
							<label class="control-label" for="confirm_password">Confirm Password</label>
							<input type="password" name="confirm_password" id="inputPasswordAgain" class="form-control" placeholder="Confirm Password">
							<span id="error_password" class="modal_error"></span>
						</div>
						
						<div class="form-group">
								<label for="rememberme">Remember me</label>
								<input name="rememberme" type="checkbox"><a href="#" class="pull-right switch-to-signin">Log In</a>
							</div>
						</div>
				</div> 
					</div>
				<div class="modal-footer in-form">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<input type="hidden" name="redirect" value="<?= Uri::string() ?>" ?>
					<button id="user_register" type="submit" class="btn btn-primary">Register</button>
				</div>
				<?= Form::close() ?>
			</div>
		</div>
	</div>
</div>
</div>
