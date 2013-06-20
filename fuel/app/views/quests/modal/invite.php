	<div id="inviteModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="inviteModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="inviteModalLabel">Invite Friends</h3>
		</div>
			<div>
			<?= Form::open(array('action' => $quest->invite_url(), 'class' => 'form-horizontal')) ?>
				<div class="control-group">
					<label class="control-label" for="inputFrom">From:</label>
					<div class="controls">
						<div class="from-email">info@itemnation.com</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="to">To:</label>
					<div class="controls">
						<input type="text" name="to" id="inputTo" placeholder="yourfriend@email.com">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="subject">Subject:</label>
					<div class="controls">
						<input type="text" name="subject" id="inputSubject" placeholder="Subject" value="Help me find a <?= $quest->name ?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="description">Description</label>
					<div class="controls">
						<textarea name="description" rows="7"><?= $user->display_name() ?> is trying to find a <?= $quest->name ?> through ItemNation and has requested your input! Please click on the link below to see their page and join in the search. Thanks!</textarea>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary">Invite</button>
				<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			</div>
		</form>
	</div>