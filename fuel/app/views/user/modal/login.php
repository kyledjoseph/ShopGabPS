	<div id="loginModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="loginModalLabel">Login</h3>
		</div>
		<div class="">
			
			<?= Form::open(array('action' => 'login')) ?>

			<div class="row">
				<div class="span3 social-login">
					<?= Html::anchor('auth/facebook', Asset::img('facebook-login.png')) ?>
				</div>
				<div class="span4 form-login">
					
					<div class="control-group">
						<label class="control-label" for="email">Email</label>
						<div class="controls">
							<input type="text" name="email" class="full-width" placeholder="Email">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="password">Password</label>
						<div class="controls">
							<input type="password" name="password" class="full-width" placeholder="Password">
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
			<div class="modal-footer footer-in-form">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
				<button type="submit" class="btn btn-primary">Login</button>
			</div>

			<?= Form::close() ?>
		</div>
	</div>