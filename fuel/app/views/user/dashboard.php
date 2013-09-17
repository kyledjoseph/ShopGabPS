	<div class="container">
		<div class="col-12">
			<ul class="nav nav-tabs">
				<li class="active"><?= Html::anchor('/', 'My Quests') ?></li>
				<li class="tour-friends-tab" data-container="body" data-placement="bottom" data-content="Check out what your friends are looking for." data-original-title="" title=""><?= Html::anchor('friends', 'Friends') ?></li>
			</ul>
		</div>
	<div class="container">
		<div class="col-12 col-sm-8">
			<div class="row">
				<div class="col-12 col-sm-8 pad-top">
					<select class="dash-search-select form-control">
						<option disabled selected>Sort By Recent Updates</option>
					</select>
			</div>
			<div class="col-12 col-sm-4 pad-top">
				<button href="#questModal" class="btn btn-success pull-right tour-quest-btn" data-container="body" data-placement="top" data-content="Get started looking for your first product." data-original-title="" title="" data-toggle="modal">Start a new quest!</button>
			</div>
		</div>
		<div class="row pad-top">
			<div class="col-12">
<div class="row">
				<?php foreach ($quests as $quest): ?>

				<div class="col-12 col-sm-4 dash-item pad-bottom">
					<a href="<?= Uri::create($quest->url()) ?>">
						<img width="100%" src="<?= $quest->default_thumb_url(250, 220) ?>">
						<h3><span><?= $quest->name() ?> (<?= $quest->total_unseen_notifications() ?>)</span></h3>
					</a>
				</div>

					<?php endforeach; ?>
					<div class="col-12 col-sm-4 dash-item dash-new pad-bottom">
						<a class="new-quest-dotted" href="#questModal" data-toggle="modal">
							<img width="100%" src="/assets/img/new-quest.png">
						</a>
					</div>
				</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-4 pad-top">
			<div class="box help-a-friend">
				<h4>Help A Friend</h4>
				<div class="content">
					<?php foreach ($user->get_friends_upcoming_quests() as $quest): ?>
					<div class="friend-box">
						<div class="media">
							<a class="pull-left" href="<?= Uri::create($quest->url()) ?>">
								<img class="media-object force-32-32" src="<?= $quest->default_thumb_url(50, 50) ?>" />
							</a>
							<div class="media-body">
								<strong><?= Html::anchor($user->get_friend_profile_url($quest->user->id), $quest->user->display_name()) ?></strong> - <?= $quest->name() ?> (<?= $quest->purchase_within() ?> days)
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>