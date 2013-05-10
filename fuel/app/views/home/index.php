			<section id="main-section">
				
				<h1>My Chats</h1>


				<?php if (empty($chats)): ?>

					<p>No open chats, <?= Html::anchor('quest/create', 'click here to Start a Quest', array('class' => 'btn green2')) ?></p>

				<?php else: ?>


					<?= Html::anchor('quest/create', 'Start a New Quest', array('class' => 'btn green2')) ?>
					
					<ul class="quest-list">
					
						<?php foreach ($chats as $chat): ?>


						<li>
							<?= Html::anchor("quest/delete/{$chat->id}", '[x]') ?> 
							<?= Html::anchor($chat->url(), $chat->name) ?>
						</li>

						<?php endforeach; ?>

					</ul>

				<?php endif; ?>

			</section>