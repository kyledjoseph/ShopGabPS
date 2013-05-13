				<section id="main-area">

					<h1>My Chats</h1>

					<?= Html::anchor('quest/create', 'Create New Quest', array('class' => 'btn green2')) ?>

			

					<?php if (empty($chats)): ?>

					<p>No open quests</p>

					<?php else: ?>

					<ul>

					<?php foreach ($chats as $chat): ?>

						<li>
							<?= Html::anchor($chat->url(), $chat->name) ?>
						</li>

					<?php endforeach; ?>

					</ul>

					<?php endif; ?>


				</section>