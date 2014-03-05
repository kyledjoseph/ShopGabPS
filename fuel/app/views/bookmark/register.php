
		<h2>Register</h2>

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
					<button type="submit" class="btn">Register</button>
					<br><br>
					<p>or sign in with <?= Html::anchor('user/auth/facebook', 'facebook') ?></p>
					<p>Already a member?  <?= Html::anchor('bookmark/login', 'Login') ?></p>
				</div>

		</form>