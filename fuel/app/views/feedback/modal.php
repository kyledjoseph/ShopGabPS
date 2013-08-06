	<div id="feedbackModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="feedbackModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="feedbackModalLabel">Feedback</h3>
		</div>
		<div class="modal-body">
			<?= Form::open(array('action' => 'user/feedback')) ?>
				<input name="name" type="text" placeholder="Your Name">
				<input name="email" type="text" placeholder="Your Email">
				<textarea name="content"></textarea>
				<button type="submit">Send Feedback</button>
			<?= Form::close() ?>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			<button class="btn btn-primary">Save changes</button>
		</div>
	</div>