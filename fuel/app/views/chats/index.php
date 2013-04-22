				<h2>My Chats</h2>

				<?= Html::anchor('chats/create', 'Start a Chat', array('class' => 'btn btn-success')) ?>

				<hr>

				<?php if (empty($chats)): ?>

				<p>No open chats</p>

				<?php else: ?>

				<?php foreach ($chats as $chat): ?>

				<p>
					<?= Html::anchor($chat->url(), $chat->name) ?>
				</p>

				<?php endforeach; ?>

				<?php endif; ?>