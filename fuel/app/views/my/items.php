
		<section id="products">
			<ul>

				<?php foreach ($products as $product): ?>
				
				<li>
					<?= Html::anchor($product->url(), "<figure>{$product->image_html()}</figure><span>{$product->name}</span>") ?>
				</li>

				<?php endforeach; ?>

			</ul>
		</section>