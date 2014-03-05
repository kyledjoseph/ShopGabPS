
<div class="modal fade" id="inviteFriendsModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Invite Friends</h4>
        </div>
        <div class="modal-body">
          <div class="modal-slice">
		<?= Form::open(array('action' => 'invite', 'class' => '')) ?>
		<div class="form-group">
			<label class="control-label" for="inputFrom">From:</label>
			<div class="from-email">info@shopgab.com</div>

		</div>
		<div class="form-group">
			<label class="control-label" for="to">To:</label>
			<input type="text" class="form-control" name="to" id="inputTo" placeholder="yourfriend@email.com">
		</div>
		<div class="form-group">
			<label class="control-label" for="subject">Subject:</label>
			<input type="text" class="form-control" name="subject" id="inputSubject" placeholder="Subject" value="Help me find a ">
		</div>
		<div class="form-group">
			<label class="control-label" for="description">Description</label>
			<textarea class="form-control" name="description" rows="7"><?= $user->display_name() ?> is trying to find a  through ShopGab and has requested your input! Please click on the link below to see their page and join in the search. Thanks!</textarea>
		</div>
	</div>
		<div class="modal-footer">
			<button class="btn btn-primary">Invite</button>
			<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
		</form>
	</div>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
