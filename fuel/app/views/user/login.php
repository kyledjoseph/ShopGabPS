	<section id="main-section">


		<h1>Login</h1>

		<?= Form::open(array('class' => 'form-horizontal')) ?>
			<ul>
				<li>
					<label for="email">Email</label>
					<input type="email" name="email" placeholder="Email">
				</li>

				<li>
					<label for="password">Password</label>
					<input type="password" name="password" placeholder="Password">
				</li>

				<li class="padded">
					<label class="checkbox">
						<input type="checkbox" name="remember" value="true"> Remember me
					</label>
				</li>

			</ul>

			<button type="submit" class="btn green2">Sign in</button>
			<?= Html::anchor('forgot', 'Forgot your password?') ?>
	

			<?= Html::anchor('user/auth/facebook', '<i class="sprites login-facebook"></i>') ?>

		</form>

	</section>