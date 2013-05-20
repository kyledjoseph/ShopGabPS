			<section id="main-section">
				
				<h1>My Quests <?= Html::anchor('quest/create', 'Start a New Quest', array('class' => 'btn green2 new-quest')) ?></h1> 


				<?php if (empty($chats)): ?>

					<p>No open quests</p>

				<?php else: ?>


					
					
					<ul class="quest-list">
					
						<?php foreach ($chats as $chat): ?>


						<li>
							<?= Html::img($chat->default_thumb_url()) ?>
							<br>
							<?= Html::anchor("quest/delete/{$chat->id}", '[x]') ?> 
							<?= Html::anchor($chat->url(), $chat->name) ?>
						</li>

						<hr>

						<?php endforeach; ?>

					</ul>

				<?php endif; ?>

			</section>