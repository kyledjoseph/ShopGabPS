		<img class="arrow left" src="/assets/img/bookmark/left.png" />
		<img class="arrow right" src="/assets/img/bookmark/right.png" />

		<img class="product-image" id="1" class="image" src="http://placehold.it/200x200">
		
		<div class="gallery">
		</div>
		<br />
<div class="form-group">
		<input type="text" class="form-control" placeholder="Product Name" maxlength="50">
	</div>
<div class="form-group">
		<input type="text" class="price form-control" placeholder="Price" maxlength="50">
	</div>
		<div class="form-group">
		<textarea class="description form-control" placeholder="Description"></textarea>
	</div>
		<div id="add_to" class="form-group">
			<?= Form::select('add_to', 'my', array('my' => 'My Quest', 'friend' => 'Friend\'s Quest', 'new' => 'New Quest'), array('class' => 'form-control')) ?>
		</div>
		<div id="friend_id" class="form-group" style="display:none">
			<?= Form::select('friend_id', null, $user->select_friends(), array('class' => 'form-control')) ?>
		</div>
		<div id="friend_quest_id" class="form-group"style="display:none">
			<?= Form::select('friend_quest_id', null, array('class' => 'form-control')) ?>
		</div>
		<div id="new_quest_name" class="form-group" style="display:none">
			<?= Form::input('new_quest_name', null, array('class' => 'form-control', 'placeholder' => 'New Quest')) ?>
		</div>
		<div id="my_quest_url" class="form-group">
			<?= Form::select('my_quest_url', null, $user->select_quest(), array('class' => 'form-control')) ?>
		</div>
		<div class="btn-container">
			<a class="cancel btn btn-default" href="#">Cancel</a>
			<a class="add btn btn-primary" href="#">Add Product</a>
		</div>
