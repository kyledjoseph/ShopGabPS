<div id="registerModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
	<div class="modal-header">
	  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	  <h3 id="loginModalLabel">Sign Up</h3>
	</div>
	<div class=>
	  <div class="row">
		<div class="span3 social-login">
		  <?= Asset::img('social-login.png') ?>
		</div>
		<div class="span4 form-login">
		  <form>
			<div class="control-group">
			  <label class="control-label" for="inputFullName">Full Name</label>
			  <div class="controls">
				<input type="text" id="inputFullName" class="full-width" placeholder="Full Name">
			  </div>
			</div>
			<div class="control-group">
			  <label class="control-label" for="inputEmail">Email</label>
			  <div class="controls">
				<input type="text" id="inputEmail" class="full-width" placeholder="Email">
			  </div>
			</div>

			<div class="control-group">
			  <label class="control-label" for="inputPassword">Password</label>
			  <div class="controls">
				<input type="password" id="inputPassword" class="full-width" placeholder="Password">
			  </div>
			</div>
			<div class="control-group">
			  <label class="control-label" for="inputPasswordAgain">Confirm Password</label>
			  <div class="controls">
				<input type="password" id="inputPasswordAgain" class="full-width" placeholder="Confirm Password">
			  </div>
			</div>
			<div class="control-group">
			  <div class="controls">
				<label class="checkbox">
				  <input type="checkbox"> Remember me
				</label>
			  </div>
			</div>
		  </form>
		</div> 
	  </div>
	  <div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		<button class="btn btn-primary">Sign Up</button>
	  </div>
	</div>
  </div>