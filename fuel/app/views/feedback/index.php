


	<h2>Sample Feedback Form</h2>

	<?= Form::open(array('class' => 'form-horizontal')) ?>

		<?php if (! isset($user)): ?>
		<div class="control-group">
			<label class="control-label" for="user_email">Your Email</label>
			<div class="controls">
				<input type="text" name="user_email" placeholder="Email">
			</div>
		</div>
		<?php endif; ?>

		<div class="control-group">
			<label class="control-label" for="feedback">Feedback</label>
			<div class="controls">
				<textarea name="feedback"></textarea>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<input name="referral_url" type="hidden" value="sample_referral_url">
				<button type="submit" class="btn">Send Feedback</button>
			</div>
		</div>

	<?= Form::close() ?>