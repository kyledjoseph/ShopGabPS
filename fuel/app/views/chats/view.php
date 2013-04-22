			<section id="mychats-user">

				<ul class="breadcrumb">
					<li><?= Html::anchor('chats', 'My Chats') ?> <span class="divider">/</span></li>
					<li class="active"><?= $chat->name() ?></li>
				</ul>

				<h1>Please help me buy a <span><?= $chat->name() ?></span></h1>

				<div>

					<div class="profile">

						<figure>
							<?= Asset::img('head-shot.png') ?>
						</figure>

						<h2><?= $chat->user->display_name() ?></h2>
					</div>

					<div class="user-message">
						<i class="sprites help-icon"></i>
						<p><?= $chat->description() ?></p>
					</div>

					<div class="invites">
						<a href="" class="btn green2 invite-button">Invite Friends</a>

						<a href="" class="view-friends"><i class="sprites view-friends-icon"></i> View Friends</a>

						<ul style="display: none;">
							<li>
								<a href="" class="sprites social facebook"></a>
							</li>
							<li>
								<a href="" class="sprites social twitter"></a>
							</li>
							<li>
								<a href="" class="sprites social mail"></a>
							</li>
							<li>
								<a href="" class="sprites social pinterest"></a>
							</li>
						</ul>

					</div>

				</div>



			</section>

			<section id="mychats">

				<div class="heading" class="cat-head">

					<a class="btn green">
						<span>+ Add New Product</span>
					</a>

					<h3>My Products</h3>
				</div>

				<ul>

					<?php foreach ($chat->get_chat_products() as $chat_product): ?>
					<?php $product = $chat_product->product ?>

					<li class="recommended">
						<i class="sprites item-add"></i>
						<i class="sprites bleft-fold"><span>1</span></i>

						<ul class="info">
							<li><h3>Model #SGP4330</h3></li>
							<li><label>User Reviews</label></li>
							<li><label>Friend Reviews</label></li>
							<li><label>Current Value</label><span class="price">$325</span></li>
						</ul>

						<div class="item">
							<figure><img src="img/mychats-sample.png"></figure>

							<h2><?= $product->name() ?></h2>
							<p>
								2 Built-in Cup Holders for Baby, Buckle Closure, Storage Basket Beneath Seat, 
								Reclining Seat... <a href="">Learn more</a>
							</p>

							<div class="votes">
								<div>
									<i class="sprites vote-up"></i>
									<span class="sprites bubble-blue"><?= $chat_product->total_upvotes() ?></span>
								</div>

								<div>
									<i class="sprites vote-down"></i>
									<span class="sprites bubble-blue"><?= $chat_product->total_downvotes() ?></span>
								</div>
							</div>

							<a class="btn orange" href=""><span>Purchase</span></a>
						</div>
					</li>

					<?php endforeach; ?>

				</ul>

			</section>

			<aside class="mychats-side">

				<section id="mychats-chat">

					<div class="heading">
						<h3>My Chat</h3>
					</div>

					<div class="chat">
						
						<div class="scrollable">

						</div>

						<form class="reply">
							<textarea placeholder="Your message..." maxlength="140"></textarea>
						</form>


					</div>

				</section>

				<div class="ads">

					<div class="ad-100x100">100x100 ad</div>
					<div class="ad-100x100">100x100 ad</div>
					<div class="ad-100x100">100x100 ad</div>

				</div>


			</aside>
