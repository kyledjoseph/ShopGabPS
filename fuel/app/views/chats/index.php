				<h2>My Chats</h2>

				<?= Html::anchor('quest/create', 'Start a Quest', array('class' => 'btn btn-success')) ?>

				<hr>

				<?php if (empty($chats)): ?>

				<p>No open quests</p>

				<?php else: ?>

				<?php foreach ($chats as $chat): ?>

				<p>
					<?= Html::anchor($chat->url(), $chat->name) ?>
				</p>

				<?php endforeach; ?>

				<?php endif; ?>