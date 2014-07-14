	<div id="questModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">New Quest</h4>
        </div>
			<div class="modal-body">
				<?= Form::open(array('action' => 'quest/create', 'method' => 'POST', 'class' => 'form-vertical push-center')) ?>
				<div class="form-group">
					<label for="name">What are you shopping for?</label>
						<input name="name" class="form-control" type="text" id="inputWhat" placeholder="Stroller">
				</div>
				<div class="form-group">
					<label for="description">Tell your friends more about what you're looking for.</label>
						<textarea name="description" class="form-control" id="inputDescription" placeholder="I'm looking for a stroller that's safe, comfortable, and most importantly: is has to have racing stripes."></textarea>
				</div>
				<div class="control-group form-group">
					<label for="purchase_within">When would you like to buy it?</label>
					<div class='styled-select'>
						<?= Form::select('purchase_within', null, Model_Quest::purchase_within_fields(), array('class' => 'form-control')) ?>
					</div>
				</div>

        <?php if ($logged_user->group == Model_User::PROFESSIONAL_GROUP_ID) { ?>
          <div class="control-group form-group">
            <label for="for_user_id">Client Name</label>
            <div class='styled-select'>
              <?= Form::select('for_user_id', $selected_client, $user->select_clients(), array('class' => 'form-control')) ?>
            </div>
          </div>
        <?php } ?>

				<button class="mx-start-quest btn btn-primary">Start Quest</button>
			</div>

			<div class="modal-footer footer-in-form">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>				
			</div>
		</form>
	</div>
</div>
</div>