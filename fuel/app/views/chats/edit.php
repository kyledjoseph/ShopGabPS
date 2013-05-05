			
		<h2>Edit Chat</h2>

		<?= Form::open() ?>

			<div class="control-group">
				<label class="control-label" for="name"></label>
				<div class="controls">
					<input type="text" name="name" value="<?= $chat->name ?>">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="description">Password</label>
				<div class="controls">
					<textarea name="description"><?= $chat->name ?></textarea>
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn">Update</button>
				</div>
			</div>

		<?= Form::close() ?>