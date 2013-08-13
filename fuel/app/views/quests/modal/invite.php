<div class="modal fade" id="inviteModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Invite Friends</h4>
			</div>
			<div class="modal-body">
				<ul id="myTab" class="nav nav-tabs">
					<li class="active"><a href="#friends" data-toggle="tab">Friends</a></li>
					<?php if (($user->is_authenticated_with('facebook')) || 1==1): ?>
					<li><a href="#facebook" data-toggle="tab">Facebook</a></li>
				<?php endif; ?>
				<li><a href="#email" data-toggle="tab">Email</a></li>
			</ul>

			<div id="myTabContent" class="tab-content">
				<div class="tab-pane fade in active" id="friends">
					<div class="modal-slice invite-friends-container">
						<h4>Friends on ShopGab</h4>
						<?php foreach ($user->get_friends() as $friend): ?>
						<div class="checkbox">
							<label>
								<input type="checkbox"> <?= Html::img($friend->profile_pic(32,32)) ?> <?= $friend->display_name() ?>
							</label>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<?php if ($user->is_authenticated_with('facebook')): ?>
			<div class="right-box">
				<h4>Invite Friends to ShopGab</h4>
				<?php $i = 1; foreach ($user->get_facebook_friends() as $facebook_friend): ?>
				<div class="media">
					<label>
						<div class="inline-block">
							<input class="inline-block auto-width" type="checkbox" />
						</div>
						<div class="inline-block">
							<?= Html::img($facebook_friend->photo_url()) ?>
							<?= $facebook_friend->display_name ?>
							<!--<?= Html::anchor($facebook_friend->profile_url(), $facebook_friend->identifier) ?>-->
						</div>
					</label>
				</div>
		<?php if ($i >= 50) break; $i++; endforeach; ?>
		</div>
	<?php endif; ?>
	<div class="tab-pane fade" id="facebook">
		<a class="" href="#" 
		onclick="
		window.open(
		'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href), 
		'facebook-share-dialog', 
		'width=626,height=436'); 
		return false;">
		<img class="push-center" src="/assets/img/share-with-friends.png" />
	</a>
</div>
<div class="tab-pane fade" id="email">
	<div class="modal-slice">
		<?= Form::open(array('action' => $quest->invite_url(), 'class' => '')) ?>
		<div class="form-group">
			<label class="control-label" for="inputFrom">From:</label>
			<div class="from-email">info@shopgab.com</div>
		</div>
		<div class="form-group">
			<label class="control-label" for="to">To:</label>
			<input type="text" class="form-control" name="to" id="inputTo" placeholder="yourfriend@email.com">
		</div>
		<div class="form-group">
			<label class="control-label" for="subject">Subject:</label>
			<input type="text" class="form-control" name="subject" id="inputSubject" placeholder="Subject" value="Help me find a <?= $quest->name ?>">
		</div>
		<div class="form-group">
			<label class="control-label" for="description">Description</label>
			<textarea class="form-control" name="description" rows="7"><?= $user->display_name() ?> is trying to find a <?= $quest->name ?> through ShopGab and has requested your input! Please click on the link below to see their page and join in the search. Thanks!</textarea>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn btn-primary">Invite</button>
		<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
	</form>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
</div>