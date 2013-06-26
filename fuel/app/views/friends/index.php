
	<div class="row">
		<div class="span6">

			<?php if ($this->user->is_authenticated_with('facebook')): ?>

			<h4>Facebook Friends</h4>

			<?php foreach ($this->user->get_facebook_friends() as $friend): ?>
			<li>
				<?= Html::img($friend->photo_url()) ?>
				<?= Html::anchor($friend->profile_url(), $friend->identifier) ?> - 
				<?= $friend->display_name ?>
			</li>
			<?php endforeach; // is_authenticated_with('facebook') ?>

			<?php else: ?>

			<p>Not authenticated with Facebook</p>

			<?php endif; ?>
		</div>
		<div class="span6">
			
		</div>
	</div>