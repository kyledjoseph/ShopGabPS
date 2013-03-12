
		<h2>Register</h2>

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
					<button type="submit" class="btn">Sign in</button>
				</div>
			</div>
		</form>