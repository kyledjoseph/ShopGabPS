		
	<section id="main-section">
			
		<h1>Edit Chat</h1>

		<?= Form::open() ?>

			<ul>
				<li>
					<label for="name">Chat Name</label>
					<input type="text" name="name" value="<?= $chat->name ?>">
				</li>
				<li>
					<label for="description">Chat Description</label>
					<textarea name="description"><?= $chat->description ?></textarea>
				</li>
			</ul>
					
			<button type="submit" class="btn">Update</button>

		<?= Form::close() ?>

	</section>