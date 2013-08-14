	<div id="feedbackModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3 id="feedbackModalLabel">Feedback</h3>
				</div>
				<div class="modal-body">
					<form action="user/feedback">
						<div class="form-group">
						<input class="form-control" name="name" type="text" placeholder="Your Name">
					</div>
					<div class="form-group">
						<input class="form-control" name="email" type="text" placeholder="Your Email">
					</div>
					<div class="form-group">
						<textarea class="form-control" name="content"></textarea>
					</div>
					<div class="form-group">
						<input class="form-control" name="referral" type="hidden" value="<?= Uri::current() ?>">
					</div>
					
				</div>
				<div class="modal-footer">
					<button class="btn btn-primary" type="submit">Send Feedback</button>
					<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>	
					</form>
				</div>
			</div>
		</div>
	</div>
