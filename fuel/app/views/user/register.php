	<section id="main-section">
		
		<h1>Register</h1>

		<?= Form::open(array('class' => 'form-horizontal')) ?>

		<ul>
			<li>			
				<label for="name">Name</label>
				<input type="text" name="name" placeholder="">
			</li>
			<li>			
				<label for="email">Email</label>
				<input type="text" name="email" placeholder="Email">
			</li>
			<li>
				<label for="password">Password</label>
				<input type="password" name="password">
			</li>
			<li>
				<label for="confirm_password">Confirm Password</label>
				<input type="password" name="confirm_password">
			</li>
		</ul>		

		<button type="submit" class="btn green2">Register</button>

		<?= Html::anchor('user/auth/facebook', '<i class="sprites login-facebook"></i>') ?>

		</form>

	</section>