			<section id="mychats-user">

				<ul class="breadcrumb">
					<li><?= Html::anchor('chats', 'My Chats') ?> <span class="divider">/</span></li>
					<li class="active"><?= $chat->name() ?></li>
				</ul>

				<h1>Please help me buy a <span><?= $chat->name() ?></span></h1>

				<div>

					<div class="profile">

						<figure>
							<?= Html::img($chat->user->profile_pic()) ?>
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
						<i class="sprites bleft-fold"><span><?= $product_i ?></span></i>

						

						<div class="item">
							<figure>
								<?php // $product->image_html() // images disabled due to display format ?>
							</figure>

							<h2><?= $product->name() ?></h2>
							<p>
								<?= $product->description() ?>
								<?= Html::anchor($product->product_url(), 'Learn more', array('target' => '_blank')) ?>
							</p>

							<div class="votes">
								<div>
									<?= Html::anchor("chats/like/{$chat->id}/{$chat_product->id}", '<i class="sprites vote-up"></i>', array('title' => $chat_product->list_user_likes(), 'class' => 'user_vote_list')) ?>
									<span class="sprites bubble-blue"><?= $chat_product->total_upvotes() ?></span>
								</div>

								<div>
									<?= Html::anchor("chats/dislike/{$chat->id}/{$chat_product->id}", '<i class="sprites vote-down"></i>', array('title' => $chat_product->list_user_dislikes(), 'class' => 'user_vote_list')) ?>
									<span class="sprites bubble-blue"><?= $chat_product->total_downvotes() ?></span>
								</div>
							</div>

							<?= Html::anchor($product->product_url(), '<span>Where can I find thhis?</span>', array('class' => 'btn orange', 'target' => '_blank')) ?>
						</div>
					</li>

					<?php $product_i++ ?>
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
							<ul>
								<?php foreach ($chat->get_messages() as $message): ?>
								<li>
									<?= $message->body ?><br>
									by <?= $message->user->display_name() ?>

								</li>
								<?php endforeach; ?>
							</ul>
						</div>

						<?= Form::open(array('action' => "chats/message/{$chat->id}", 'method' => 'POST', 'class' => 'reply')) ?>
							<textarea name="message" placeholder="Your message..." maxlength="140"></textarea>
							<button type="submit">send</button>
						</form>


					</div>

				</section>

				<div class="ads hidden"> <!-- will not have ads for now -->

					<div class="ad-100x100">100x100 ad</div>
					<div class="ad-100x100">100x100 ad</div>
					<div class="ad-100x100">100x100 ad</div>

				</div>


			</aside>
