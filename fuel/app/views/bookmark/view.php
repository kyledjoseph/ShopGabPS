		<img class="arrow left" src="/assets/img/bookmark/left.png" />
		<img class="arrow right" src="/assets/img/bookmark/right.png" />

		<img class="product-image" id="1" class="image" src="http://placehold.it/200x200">
		
		<div class="gallery">
		</div>

		<ul>
			<li>
				<input type="text" class="title" placeholder="Product Name" maxlength="50">
			</li>
			<li>
				<input type="text" class="price" placeholder="Price" maxlength="50">
			</li>
			<li>
				<textarea class="description" placeholder="Description"></textarea>
			</li>

			<li id="add_to">
				<label for="add_to">Add to:</label>
				<?= Form::select('add_to', 'my', array('my' => 'My Quest', 'friend' => 'Friend\'s Quest', 'new' => 'New Quest')) ?>
			</li>

			<li id="friend_id" style="display:none">
				<label for="friend_id">Friends' Quests:</label>
				<?= Form::select('friend_id', null, $user->select_friends()) ?>
			</li>

			<li id="friend_quest_id" style="display:none">
				<label for="friend_quest_id">Friends' Quests:</label>
				<?= Form::select('friend_quest_id', null, array()) ?>
			</li>

			<li id="new_quest_name" style="display:none">
				<label for="new_quest_name">New Quest:</label>
				<?= Form::input('new_quest_name') ?>
			</li>

			<li id="my_quest_url">
				<label for="my_quest_url">My Quests: </label>
				<?= Form::select('my_quest_url', null, $user->select_quest()) ?>
			</li>

		</ul>
		<div class="btn-container">
			<a class="cancel" href="#">Cancel</a>
			<a class="add" href="#">Add Product</a>
		</div>
