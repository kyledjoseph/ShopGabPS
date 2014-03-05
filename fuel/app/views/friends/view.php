	<div class="row">
		<div class="col-12">
			<ul class="nav nav-tabs">
				<li><?= Html::anchor('/', 'My Quests') ?></li>
				<li class="active"><?= Html::anchor('friends', 'Friends') ?></li>
			</ul>
		</div>
	</div>

	<div class="row">
		<div class="col-12 col-sm-8">
			
			<div class="row pad-top">
				<ul class="breadcrumb">
					<li><?= Html::anchor('friends', 'All ShopGab Friends') ?></li>
					<li class="active"><?= $friendship->friend->display_name() ?>'s Quests</li>
				</ul>
			</div>

			<div class="row">
				<div class="col-12 col-sm-8">
					<select class="dash-search-select form-control">
						<option disabled selected>Sort By Recent Updates</option>
					</select>
					<select class="dash-search-select-small form-control hidden">
						<option disabled selected>All</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
			</div>
			<div class="col-12 col-sm-4">
					<button href="#questModal" class="btn btn-success pull-right" data-toggle="modal">Start a new quest!</button>
			</div>
		</div>
		<div class="row pad-top">
			<div class="col-12">

				<?php $i = 1; foreach ($quests as $quest): ?>

				<?php if ($i == 1): ?>
				<div class="row">
				<?php endif; ?>

				<div class="col-12 col-sm-4 dash-item pad-bottom">
					<a href="<?= Uri::create($quest->url()) ?>">
						<img width="100%" src="<?= $quest->default_thumb_url(250,220) ?>">
						<h3><span><?= $quest->name() ?></span></h3>
					</a>
					
					<!--
					<div class="btn-group">
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
			<h4><?= $friendship->friend->display_name() ?></h4>
			<div class="content">
				<?= Html::img($friendship->friend->get_avatar_uri(200, 200), array('class' => 'force-200-200')) ?>
				<p><?= $total_quests . ' ' . Inflector::pluralize('quest', $total_quests) ?>
			</div>
		</div>
	</div>
