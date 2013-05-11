

	<section id="main-section">

		<h1>Create a new Quest</h1>

		<?= Form::open(array('class' => 'form-horizontal')) ?>

			<ul>
				<li>
					<label for="name">I'm looking for a</label>
					<input type="text" name="name">
				</li>
				<li>
					<label for="description">Tell your friends a little bit about what you're looking for.</label>
					<textarea name="description" rows="6"></textarea>
				</li>
				<li>
					<label for="purchase_within">I want to purchase this within</label>
					<?= Form::select('purchase_within', null, Model_Chat::purchase_within_fields()) ?>
				</li>

					<button type="submit" class="btn green2">Create my Quest</button>

			
		<?= Form::close() ?>

	</section>