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
				<label for="add_to">add_to</label>
				<?= Form::select('add_to', 'my', array('my' => 'My Quest', 'friend' => 'Friend\'s Quest', 'new' => 'New Quest')) ?>
			</li>

			<li id="friends" style="display:none">
				<label for="add_to">friends</label>
				<?= Form::select('friend', null, $user->select_friends()) ?>
			</li>

			<li id="friend_quests" style="display:none">
				<label for="friend_quests">friend_quests</label>
				<?= Form::select('friend_quest', null, array()) ?>
			</li>

			<li id="new_quest" style="display:none">
				<label for="new_quest">new_quest</label>
				<?= Form::input('new_quest') ?>
			</li>

			<li id="my_quests">
				<label for="my_quests">my_quests</label>
				<?= Form::select('my_quest', null, $user->select_chat()) ?>
			</li>

		</ul>
		<div class="btn-container">
			<a class="cancel" href="#">Cancel</a>
			<a class="add" href="#">Add Product</a>
		</div>
