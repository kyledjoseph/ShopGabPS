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
	

					<p>or sign in with 
						<?= Html::anchor('user/auth/facebook', 'facebook') ?> | 
						<?= Html::anchor('user/auth/twitter', 'twitter') ?> | 
						<?= Html::anchor('user/auth/google', 'google') ?>
					</p>

		</form>

	</section>