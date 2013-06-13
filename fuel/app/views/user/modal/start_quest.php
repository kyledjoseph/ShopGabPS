	<div id="questModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="questModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="questModalLabel">New Quest</h3>
		</div>
		
		<?= Form::open(array('action' => 'quest/create', 'method' => 'POST', 'class' => 'form-vertical push-center')) ?>
			<div>
				<div class="control-group">
					<label class="control-label" for="name">What are you shopping for?</label>
					<div class="controls">
						<input name="name" type="text" id="inputWhat" placeholder="Stroller">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="description">Tell your friends more about what you're looking for.</label>
					<div class="controls">
						<textarea name="description" id="inputDescription" placeholder="I'm looking for a stroller that's safe, comfortable, and most importantly: is has to have racing stripes."></textarea>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="purchase_within">When would you like to buy it?</label>
					<div class="controls">
						<select name="purchase_within">
							<option disabled selected>Purchase by</option>
							<option>1 week</option>
							<option>2 weeks</option>
							<option>3 weeks</option>
							<option>4 weeks</option>
							<option>5 weeks</option>
						</select>
					</div>
				</div>
			</div>
			
			<div class="modal-footer footer-in-form">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
				<button class="btn btn-primary">Start Quest</button>
			</div>
		</form>
	</div>