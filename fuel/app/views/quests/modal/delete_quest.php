<div id="deleteQuestModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deleteQuestModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="deleteQuestModalLabel">Are you sure?</h3>
	</div>
	<div class="modal-body">
		<p>This change is permanent and can <em>not</em> be reversed.</p>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		<a href="/<?= $quest->delete_url() ?>">
			<button class="btn btn-danger">Delete Quest</button>
		</a>
	</div>
</div>