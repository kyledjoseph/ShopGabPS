		
		<h2>Login</h2>

		<?= Form::open(array('class' => 'form-horizontal')) ?>
			<div class="control-group">
				<label class="control-label" for="email">Email</label>
				<div class="controls">
					<input type="text" name="email" placeholder="Email">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="password">Password</label>
				<div class="controls">
					<input type="password" name="password" placeholder="Password">
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<label class="checkbox">
						<input type="checkbox" name="remember" value="true"> Remember me
					</label>
					<br>
					<button type="submit" class="btn">Sign in</button>
					<br><br>
					<p>or sign in with 
						<?= Html::anchor('user/auth/facebook', 'facebook') ?> | 
						<?= Html::anchor('user/auth/twitter', 'twitter') ?> | 
						<?= Html::anchor('user/auth/google', 'google') ?>
					</p>
				</div>
			</div>
		</form>