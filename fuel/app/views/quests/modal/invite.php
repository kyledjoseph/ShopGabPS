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
					<?= Html::img($friend->profile_pic(32,32)) ?>
					<?= $friend->display_name() ?>
				</p>
				<?php endforeach; ?>

			</div>
		
			<?php if ($user->is_authenticated_with('facebook')): ?>
			<div class="tab-pane fade" id="faceook">
				
				<h4>Friends on ItemNation</h4>
				<?php foreach ($user->get_registered_facebook_friends() as $facebook_friend): ?>
				
				<li>
					<?= Html::img($facebook_friend->photo_url()) ?>
					<?= Html::anchor($facebook_friend->profile_url(), $facebook_friend->identifier) ?> - 
					<?= $facebook_friend->display_name ?>
				</li>
				
				<?php endforeach; ?>

				<hr>

				<h4>All Friends</h4>
				<?php foreach ($user->get_registered_facebook_friends() as $facebook_friend): ?>
				
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
					<?= Form::open(array('action' => $quest->invite_url(), 'class' => 'form-horizontal')) ?>
					<div class="control-group">
						<label class="control-label" for="inputFrom">From:</label>
						<div class="controls">
							<div class="from-email">info@itemnation.com</div>
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
							<input type="text" name="subject" id="inputSubject" placeholder="Subject" value="Help me find a <?= $quest->name ?>">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="description">Description</label>
						<div class="controls">
							<textarea name="description" rows="7"><?= $user->display_name() ?> is trying to find a <?= $quest->name ?> through ItemNation and has requested your input! Please click on the link below to see their page and join in the search. Thanks!</textarea>
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