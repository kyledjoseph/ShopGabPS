<div class="container">
	<div class="col-12">
		<ul class="nav nav-tabs">
			<li><?= Html::anchor('/', 'My Quests') ?></li>
			<li class="active"><?= Html::anchor('friends', 'Friends') ?></li>
		</ul>
	</div>
</div>
<div class="container">
	<div class="col-12 col-sm-8">
		<div class="row">
			<div class="col-12 col-sm-8 pad-top">
				<?php if (Fuel::$env !== 'production'): ?>
				<select class="dash-search-select form-control">
					<option disabled selected>Sort By Recent Updates</option>
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
				</select>
				<select class="dash-search-select-small form-control">
					<option disabled selected>All</option>
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
				</select>
			<?php endif; ?>
		</div>
		<div class="col-12 col-sm-4 pad-top">
				<button href="#questModal" class="btn btn-success pull-right" data-toggle="modal">Start a new quest!</button>
		</div>
	</div>
	<div class="row pad-top">
	<div class="col-12">

		<?php $i = 1; foreach ($friends_quests as $quest): ?>

		<?php if ($i == 1): ?>
		<div class="row">
		<?php endif; ?>

		<div class="col-12 col-sm-4 dash-item pad-bottom">
				<a href="<?= Uri::create($quest->url()) ?>">
					<img width="100%" src="<?= $quest->default_thumb_url(250,220) ?>">
					<h3><span><?= $quest->name() ?></span></h3>
				</a>
							<!-- <div class="btn-group">
								<button class="btn dropdown-toggle" data-toggle="dropdown">
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Option 1</a></li>
									<li><a href="#">Option 2</a></li>
									<li><a href="#">Option 3</a></li>
								</ul>
							</div> 
							<a href="#"><img class="lock" src="/assets/img/notification-lock.png" /></a>
							<a href="#"><img class="friends inactive" src="/assets/img/notification-friends.png" /></a>
							<a href="#"><img class="basket inactive" src="/assets/img/notification-basket.png" /></a>
							<a href="#"><img class="chat inactive" src="/assets/img/notification-chat.png" /></a>
						-->
				</div>

				<?php $i++ ?>
				<?php if ($i == 4): ?></div><?php $i = 1; endif; ?>

			<?php endforeach; ?>
			<?php if ($i != 1): ?></div><?php endif; ?>

		</div>
</div>
</div>
<div class="col-12 col-sm-4 pad-top">
			<div class="box help-a-friend">
				<h4>Friends</h4>
				<button href="#inviteFriendsModal" class="corner-button btn btn-medium btn-success" data-toggle="modal">+ Invite</button>
				<div class="content">
					
					<div class="friend-box align-center">
						<form class="form-search">
							<input type="text" class="input-medium form-control" placeholder="Search">
						</form>
					</div>
					<?php foreach ($user->get_friendships() as $friendship): ?>
					<div class="friend-box">
						<div class="media">
							<a class="pull-left" href="#">
    							<img class="media-object" src="<?= $friendship->friend->get_avatar_uri() ?>" />
  							</a>
  							<div class="media-body">
    							<strong><?= Html::anchor("friends/view/{$friendship->id}", $friendship->friend->display_name()) ?></strong>  - <?= Html::anchor("friends/hide/{$friendship->id}", 'Remove', array('class' => 'remove')) ?>
  							</div>
  						</div>
					<?php endforeach; ?>

					<?php if (false): ?>
					<h5 class="align-center">Friends On Facebook</h5>
					<div class="friend-box">
						<div class="image">
							<img src="//placehold.it/50x50" />
						</div>
						<div class="text">
							<h5>John Doe</h5>
							<button href="#inviteModal" class="btn btn-default invite-friend-btn" data-toggle="modal">Invite</button>
						</div>
					</div>
					<?php endif; ?>
				</div>

				
				<?php if (false and $this->user->is_authenticated_with('facebook')): ?>
				<div class="box">
					
					<h4>Facebook Friends on ShopGab</h4>
					<?php foreach ($this->user->get_registered_facebook_friends() as $friend): ?>

					<div class="friend-box">
						<div class="image">
							<?= Html::img($friend->photo_url()) ?>
						</div>
						<div class="text">
							<h5><?= $friend->display_name ?></h5>
						</div>
					</div>

					<?php endforeach; // is_authenticated_with('facebook') ?>
				</div>
				<?php endif; ?>

			</div>
		</div>
		</div>
	</div>
</div>
