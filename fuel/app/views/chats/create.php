

	<ul class="breadcrumb">
					<li><?= Html::anchor('chats', 'My Chats') ?> <span class="divider">/</span></li>
					<li class="active">Create a Chat</li>
				</ul>

	<?= Form::open(array('class' => 'form-horizontal')) ?>

		<div class="control-group">
			<label class="control-label" for="name">I'm looking for a</label>
			<div class="controls">
				<input type="text" name="name">
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="description">Tell your friends a little bit about what you're looking for.</label>
			<div class="controls">
				<textarea name="description" rows="6"></textarea>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="purchase_within">I want to purchase this within</label>
			<div class="controls">
				<?= Form::select('purchase_within', null, Model_Chat::purchase_within_fields()) ?>
			</div>
		</div>

		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn">Create Chat</button>
			</div>
		</div>
		
	<?= Form::close() ?>