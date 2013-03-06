	
	<h2>add product</h2>
	<?= Html::anchor('admin/products', 'back to Product Index') ?>

	<hr>

	<?= Form::open(array('class' => 'form-horizontal')) ?>

		<div class="control-group">
			<label class="control-label" for="name">Name</label>
			<div class="controls">
				<input type="text" id="name" name="name" placeholder="Name">
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="brand">Brand</label>
			<div class="controls">
				<input type="text" id="brand" name="brand" placeholder="Brand">
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="model">Model</label>
			<div class="controls">
				<input type="text" id="model" name="model" placeholder="Model">
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="serial">Serial</label>
			<div class="controls">
				<input type="text" id="serial" name="serial" placeholder="Serial">
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="warranty">Warranty</label>
			<div class="controls">
				<input type="text" id="warranty" name="warranty" placeholder="Warranty">
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="type">Type</label>
			<div class="controls">
				<input type="text" id="type" name="type" placeholder="Type">
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="dimensions">Dimensions</label>
			<div class="controls">
				<input type="text" id="dimensions" name="dimensions" placeholder="Dimensions">
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="weight">Weight</label>
			<div class="controls">
				<input type="text" id="weight" name="weight" placeholder="Weight">
			</div>
		</div>
		
		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn">Add Product</button>
			</div>
		</div>

	<?= Form::close() ?>