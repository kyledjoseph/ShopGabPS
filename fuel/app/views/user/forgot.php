	<section id="main-section">


		<h1>Forgot Password</h1>

		<?= Form::open(array('class' => 'form-horizontal')) ?>
			<ul>
				<li>
					<label for="email">Email</label>
					<input type="email" name="email" placeholder="Email">
				</li>
			</ul>

			<button type="submit" class="btn green2">Send Reset Email</button>
			<?= Html::anchor('login', 'Back to login') ?>

		</form>

	</section>