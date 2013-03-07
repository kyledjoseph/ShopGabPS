				<section id="products">
					<ul>

						<?php foreach ($categories as $category): ?>
						
						<li>
							<?= Html::anchor($category->public_url(), "<figure></figure><span>{$category->name}</span>") ?>
						</li>

						<?php endforeach; ?>

					</ul>
				</section>