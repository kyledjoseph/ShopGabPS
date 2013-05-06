			<section id="mychats-user">

				<ul class="breadcrumb">
					<li><?= Html::anchor('quest', 'My Quests') ?> <span class="divider">/</span></li>
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
						<p><?= Html::anchor("{$chat->url()}/edit", 'edit') ?></p>
					</div>

					<div class="invites">
						<span href="" class="btn green2 invite-button friends-go">Invite Friends</span>

						<span href="" class="view-friends friends-go"><i class="sprites view-friends-icon"></i> View Friends</span>

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

					<a class="btn green addnew-go">
						<span>+ Add New Product</span>
					</a>

					<h3>My Products</h3>
				</div>

				<ul>

					<?php foreach ($chat->get_chat_products() as $chat_product): ?>
					<?php $product = $chat_product->product ?>

					<li class=""> <!-- class="recommended" -->
						<i class="sprites item-add"></i>
						<i class="sprites bleft-fold"><span><?= $product_i ?></span></i>

						

						<div class="item">
							<figure>
								<?= $product->thumb_html() ?>
							</figure>

							<h2><?= $product->name() ?></h2>
							<p class="chat-product-description">
								<?= $product->description() ?>
							</p>


							<div class="comments">
								<span class="show-comments" data-total="<?= $chat_product->total_comments() ?>">
									<i class="sprites comment-icon <?= $chat_product->has_comments() ? 'on' : 'off' ?>"><?= $chat_product->total_comments() ?></i> Comments
								</span>

								<div class="comment-display" style="display:none">
									<hr>
									<?php foreach ($chat_product->get_comments() as $comment): ?>

										<div class="comment">
											<?= Html::img($comment->user->profile_pic(24,24)) ?>
											<?= $comment->user->display_name() ?><br>
											
											<?= $comment->comment ?><br>
											<?= $comment->time_ago() ?>
										</div>
										<hr>

									<?php endforeach; ?>
								</div>

								<div class="add-comment">
									<?= Form::open(array('action' => "{$chat->url()}/comment")) ?>
										<?= Html::img($user->profile_pic(24, 24)) ?>
										<input name="comment" type="text">
										<input name="chat_product_id" type="hidden" value="<?= $chat_product->id ?>">
										<button type="submit">comment</button>
									<?= Form::close() ?>
								</div>
							</div>

							<div class="controls-container">
								<div class="votes">
									<div>
										<?= Html::anchor("quest/like/{$chat->id}/{$chat_product->id}", '<i class="sprites vote-up"></i>', array('title' => $chat_product->list_user_likes(), 'class' => 'user_vote_list')) ?>
										<span class="sprites bubble-blue"><?= $chat_product->total_upvotes() ?></span>
									</div>

									<div>
										<?= Html::anchor("quest/dislike/{$chat->id}/{$chat_product->id}", '<i class="sprites vote-down"></i>', array('title' => $chat_product->list_user_dislikes(), 'class' => 'user_vote_list')) ?>
										<span class="sprites bubble-blue"><?= $chat_product->total_downvotes() ?></span>
									</div>
								</div>

								<?= Html::anchor($product->product_url(), '<span>Where can I find this?</span>', array('class' => 'btn orange', 'target' => '_blank')) ?>
							</div>
							
						</div>
					</li>

					

					<?php $product_i++ ?>
					<?php endforeach; ?>

				</ul>

			</section>

			<aside class="mychats-side">

				<section id="mychats-chat">

					<div class="heading">
						<h3>Discussion</h3>
					</div>

					<div class="chat">
						
						<div class="scrollable">
							<ul>
								<?php foreach ($chat->get_messages() as $message): ?>
								<li>
									<span class="name">
										<?= Html::img($message->user->profile_pic(20, 20)) ?>
										<?= $message->user->display_name() ?>
									</span>
									<p><?= $message->body ?></p>
									<span class="date">posted <?= $message->time_ago() ?></span>
								</li>
								<?php endforeach; ?>
							</ul>
						</div>

						<?= Form::open(array('action' => "quest/message/{$chat->id}", 'method' => 'POST', 'class' => 'reply')) ?>
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
