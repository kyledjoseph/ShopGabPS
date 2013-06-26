
	<div class="row">
		<div class="span6">

			<?php if ($this->user->is_authenticated_with('facebook')): ?>

			<h4>Facebook Friends</h4>

			<?php foreach ($this->user->get_facebook_friends() as $friend): ?>
			<?php $url = strtok($friend->photoURL, '?') . '?width=32&height=32' ?>
			<li>
				<?= Html::img($url) ?>
				<?= Html::anchor($friend->profileURL, $friend->identifier) ?> - 
				<?= $friend->displayName ?>
			</li>
			<?php endforeach; // is_authenticated_with('facebook') ?>


			<?php endif; ?>
		</div>
		<div class="span6">
			
		</div>
	</div>