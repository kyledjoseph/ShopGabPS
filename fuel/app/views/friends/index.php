		<ul class="nav nav-tabs">
			<li><?= Html::anchor('/', 'My Quests') ?></li>
			<li class="active"><?= Html::anchor('friends', 'Friends') ?></li>
		</ul>



		<div class="row">
			<div class="span9">
				<!-- <select>
					<option disabled selected>Sort By Recent Updates</option>
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
				</select>
				<select class="select-all">
					<option disabled selected>All</option>
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
				</select> -->
				<button class="btn btn-success pull-right">Start a new quest!</button>
			</div>
		</div>
		
		<div class="row">
			<div class="span9">
				<?php $i = 1; foreach ($friends_quests as $quest): ?>

				<?php if ($i == 1): ?>
				<div class="row">
				<?php endif; ?>

					<div class="span3">
						<div class="dashboard-box highlight">
							<a href="<?= Uri::create($quest->url()) ?>">
								<img class="full-size" src="<?= $quest->default_thumb_url() ?>">
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
					</div>

				<?php $i++ ?>
				<?php if ($i == 4): ?></div><?php $i = 1; endif; ?>

				<?php endforeach; ?>
				<?php if ($i != 1): ?></div><?php endif; ?>
			</div>

			<div class="span3">
				<div class="box">
					<h4>Friends</h4>
					<button href="#inviteModal" class="invite-friend btn btn-medium btn-success" data-toggle="modal">+ Invite Friend</button>
					<div class="friend-box align-center">
						<form class="form-search">
							<input type="text" class="input-medium search-query" placeholder="Search">
						</form>
					</div>
					<h5 class="align-center">Friends On ShopGab</h5>
					<?php foreach ($user->get_friendships() as $friendship): ?>
		
					<div class="friend-box">
						<div class="image">
							<img src="//placehold.it/50x50" />
						</div>
						<div class="text">
							<h5><?= Html::anchor("friends/view/{$friendship->id}", $friendship->friend->display_name()) ?></h5>
							<?= Html::anchor("friends/hide/{$friendship->id}", 'Remove', array('class' => 'remove')) ?>
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
							<button href="#inviteModal" class="btn invite-friend-btn" data-toggle="modal">Invite Friend</button>
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

			<div id="inviteModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="inviteModalLabel" aria-hidden="true">
		<div class="modal-header">	
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="inviteModalLabel">Invite Friends</h3>
		</div>

		<br>

		<ul id="myTab" class="nav nav-tabs">
			<li>&nbsp;&nbsp;&nbsp;</li>
			<li class="active"><a href="#friends" data-toggle="tab">IN Friends</a></li>
			<?php if ($user->is_authenticated_with('facebook')): ?>
			<li><a href="#facebook" data-toggle="tab">Facebook</a></li>
			<?php endif; ?>
			<li><a href="#email" data-toggle="tab">Email</a></li>
		</ul>



		<div id="myTabContent" class="tab-content">
			<div class="tab-pane fade in active" id="friends">
				
				<?php foreach ($user->get_friends() as $friend): ?>
				<p>
					<?= Html::img($friend->get_avatar_uri()) ?>
					<?= $friend->display_name() ?>
				</p>
				<?php endforeach; ?>

			</div>
		
			<?php if ($user->is_authenticated_with('facebook')): ?>
			<div class="tab-pane fade" id="facebook">
				
				<h4>Friends on ShopGab</h4>
				<?php foreach ($user->get_registered_facebook_friends() as $facebook_friend): ?>
				
				<li>
					<?= Html::img($facebook_friend->photo_url()) ?>
					<?= Html::anchor($facebook_friend->profile_url(), $facebook_friend->identifier) ?> - 
					<?= $facebook_friend->display_name ?>
				</li>
				
				<?php endforeach; ?>

				<hr>

				<h4>All Friends</h4>
				<?php foreach ($user->get_facebook_friends() as $facebook_friend): ?>
				
				<li>
					<?= Html::img($facebook_friend->photo_url()) ?>
					<?= Html::anchor($facebook_friend->profile_url(), $facebook_friend->identifier) ?> - 
					<?= $facebook_friend->display_name ?>
				</li>

				<?php endforeach; ?>

			</div>
			<?php endif; ?>

			<div class="tab-pane fade" id="email">
				<div>
					<?= Form::open(array('action' => '', 'class' => 'form-horizontal')) ?>
					<div class="control-group">
						<label class="control-label" for="inputFrom">From:</label>
						<div class="controls">
							<div class="from-email">info@shopgab.com</div>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="to">To:</label>
						<div class="controls">
							<input type="text" name="to" id="inputTo" placeholder="yourfriend@email.com">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="subject">Subject:</label>
						<div class="controls">
							<input type="text" name="subject" id="inputSubject" placeholder="Subject" value="">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="description">Description</label>
						<div class="controls">
							<textarea name="description" rows="7"><?= $user->display_name() ?> is trying to find a through ShopGab and has requested your input! Please click on the link below to see their page and join in the search. Thanks!</textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-primary">Invite</button>
					<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
				</div>
			</div>
		
		</div>

		
		</form>
	</div>