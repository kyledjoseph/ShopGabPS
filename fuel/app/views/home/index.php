			<section id="main-section">
				
				<h1>My Chats</h1>

				<hr>

				<?php if (empty($chats)): ?>

					<p>No open chats, <?= Html::anchor('quest/create', 'click here to Start a Quest', array('class' => 'btn green2')) ?></p>

				<?php else: ?>


					<?= Html::anchor('quest/create', 'Start a new Quest', array('class' => 'btn btn-success')) ?>
					
					
					<?php foreach ($chats as $chat): ?>


					<p>
						<?= Html::anchor("quest/delete/{$chat->id}", '[x]') ?> 
						<?= Html::anchor($chat->url(), $chat->name) ?>
					</p>

					<?php endforeach; ?>

				<?php endif; ?>

			</section>