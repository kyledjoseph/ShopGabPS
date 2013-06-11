
		<h2>Login</h2>

		<?= Form::open() ?>
			
				<label class="control-label" for="email">Email</label>
				<div class="controls">
					<input type="text" name="email" placeholder="Email">
				</div>
			
				<label class="control-label" for="password">Password</label>
				<div class="controls">
					<input type="password" name="password" placeholder="Password">
				</div>
			
				<div class="controls">
					<button type="submit" class="btn btn-success">Sign in</button>
					<br><br>
					<p><?= Html::anchor('bookmark/auth/facebook', Html::img('assets/img/facebook-login.png')) ?></p>
					<p>No account?  <?= Html::anchor('bookmark/register', 'Register') ?></p>
				</div>

		</form>