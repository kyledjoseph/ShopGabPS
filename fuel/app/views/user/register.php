	<section id="main-section">
		
		<h1>Register</h1>

		<?= Form::open(array('class' => 'form-horizontal')) ?>

		<ul>
			<li>			
				<label for="email">Email</label>
				<input type="text" name="email" placeholder="Email">
			</li>
			<li>
				<label for="password">Password</label>
				<input type="password" name="password" placeholder="Password">
			</li>
		</ul>		

		<button type="submit" class="btn green2">Register</button>

		<?= Html::anchor('user/auth/facebook', '<i class="sprites login-facebook"></i>') ?>

		</form>

	</section>