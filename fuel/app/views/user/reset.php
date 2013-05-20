	<section id="main-section">


		<h1>Forgot Password</h1>

		<?= Form::open(array('class' => 'form-horizontal')) ?>
			<ul>
				<li>
					<label for="password">New Password</label>
					<input type="password" name="password" placeholder="Email">
				</li>

				<li>
					<label for="confirm_password">Confirm Password</label>
					<input type="password" name="confirm_password" placeholder="Email">
				</li>
			</ul>

			<button type="submit" class="btn green2">Save New Password</button>

		</form>

	</section>