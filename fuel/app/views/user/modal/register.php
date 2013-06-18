	<div id="registerModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="loginModalLabel">Sign Up</h3>
		</div>
		
		
			<div class="row">
				<div class="span3 social-login">
					<?= Html::anchor('auth/facebook', Asset::img('facebook-login.png')) ?>
				</div>
				<div class="span4 form-login">
					<?= Form::open(array('action' => 'user/register', 'method' => 'post')) ?>
					<div>
						<div class="control-group">
							<label class="control-label" for="name">Full Name</label>
							<div class="controls">
								<input type="text" name="name" id="inputFullName" class="full-width" placeholder="Full Name">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="email">Email</label>
							<div class="controls">
								<input type="text" name="email" id="inputEmail" class="full-width" placeholder="Email">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="password">Password</label>
							<div class="controls">
								<input type="password" name="password" id="inputPassword" class="full-width" placeholder="Password">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="confirm_password">Confirm Password</label>
							<div class="controls">
								<input type="password" name="confirm_password" id="inputPasswordAgain" class="full-width" placeholder="Confirm Password">
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<label class="checkbox">
									<input type="checkbox"> Remember me
								</label>
							</div>
						</div>
					</div>
				</div> 
			</div>
			
			<div class="modal-footer footer-in-form">
				<input type="hidden" name="login_redirect" value="<?= Uri::string() ?>" ?>
				<!-- <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button> -->
				<button class="btn btn-primary">Sign Up</button>
			</div>
		</form>
	</div>