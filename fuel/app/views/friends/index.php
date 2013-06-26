
	<div class="row">
		<div class="span6">
			<h4>Facebook Friends</h4>

			<?php foreach ($facebook_friends as $friend): ?>
			<?php $url = strtok($friend->photoURL, '?') . '?width=32&height=32' ?>
			<li>
				<?= Html::img($url) ?>
				<?= Html::anchor($friend->profileURL, $friend->identifier) ?> - 
				<?= $friend->displayName ?>
			</li>
			<?php endforeach; ?>
		</div>
		<div class="span6">
			
		</div>
	</div>