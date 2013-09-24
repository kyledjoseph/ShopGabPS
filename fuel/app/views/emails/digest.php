
	<?php foreach ($quests_with_notifications as $quest): ?>

			<?= Html::anchor($quest->full_url(), $quest->name()) ?>

			<?php foreach ($quest->get_notifications_on_date($date) as $notification): ?>
			<?php $event = $notification->get_event() ?>
	
				<?= $notification->text() ?>
				
			<?php endforeach; ?>

	<?php endforeach; ?>