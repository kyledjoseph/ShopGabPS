
				<h2>My Chats</h2>

				<hr>

				<?php if (empty($chats)): ?>

				<p>No open chats, <?= Html::anchor('chats/create', 'click here to Start a Chat', array('class' => 'btn btn-success')) ?></p>

				<?php else: ?>

				<?= Html::anchor('chats/create', 'Start a new Chat', array('class' => 'btn btn-success')) ?>
				
				<?php foreach ($chats as $chat): ?>

				<p>
					<?= Html::anchor($chat->url(), $chat->name) ?>
				</p>

				<?php endforeach; ?>

				<?php endif; ?>