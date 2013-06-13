	<div id="questModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="questModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="questModalLabel">Edit Quest</h3>
		</div>
		
		<?= Form::open(array('action' => $quest->edit_url(), 'method' => 'POST', 'class' => 'form-vertical push-center')) ?>
			<div>
				<div class="control-group">
					<label class="control-label" for="name">What are you shopping for?</label>
					<div class="controls">
						<input name="name" type="text" id="inputWhat" value="<?= $quest->name ?>">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="description">Tell your friends more about what you're looking for.</label>
					<div class="controls">
						<textarea name="description" id="inputDescription" rows="6"><?= $quest->description ?></textarea>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="purchase_within">When would you like to buy it?</label>
					<div class="controls">
						<?= Form::select('purchase_within', $quest->purchase_within(), Model_Quest::purchase_within_fields()) ?>
					</div>
				</div>
			</div>
			
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Save Changes</button>
				<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			</div>
		</form>
	</div>