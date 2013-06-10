	<div id="questModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="questModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="questModalLabel">New Quest</h3>
		</div>
		<div>
			<form class="form-vertical push-center">
				<div class="control-group">
					<label class="control-label" for="inputWhat">What are you shopping for?</label>
					<div class="controls">
						<input type="text" id="inputWhat" placeholder="Stroller">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="inputWhen">When would you like to buy it?</label>
					<div class="controls">
						<select>
							<option disabled selected>Purchase by</option>
							<option>1 week</option>
							<option>2 weeks</option>
							<option>3 weeks</option>
							<option>4 weeks</option>
							<option>5 weeks</option>
						</select>
					</div>
				</div>
			</form>
			
			<div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
				<button class="btn btn-primary">Start Quest</button>
			</div>
		</div>
	</div>