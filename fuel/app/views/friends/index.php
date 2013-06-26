
	<div class="row">
		<div class="span6">
			<h4>Facebook Friends</h4>

			<?php foreach ($facebook_friends as $friend): ?>
			<li>
				<?= Html::img($friend->photoURL) ?>
				<?= Html::anchor($friend->profileURL, $friend->identifier) ?> - 
				<?= $friend->displayName ?>
			</li>
			<?php endforeach; ?>
		</div>
		<div class="span6">
			
		</div>
	</div>