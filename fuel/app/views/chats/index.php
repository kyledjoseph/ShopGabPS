				<h2>My Chats</h2>


				<?php if (empty($chats)): ?>

				<p>No chats open</p>

				<?php else: ?>

				<?php foreach ($chats as $chat): ?>

				<p>
					<?= Html::anchor($chat->url(), $chat->name) ?>
				</p>

				<?php endforeach; ?>

				<?php endif; ?>