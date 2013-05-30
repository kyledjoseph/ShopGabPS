			<section id="mychats-user">

				<!-- <ul class="breadcrumb">
					<li><?= Html::anchor('/', 'My Quests') ?> <span class="divider">/</span></li>
					<li class="active"><?= $chat->name() ?></li>
				</ul> -->

				<div class="purchase-head">
					<h1>Please help me find a <span><?= $chat->name() ?></span></h1>
				</div>

				<div>

					<div class="profile">
						<h2><?= $chat->user->display_name() ?></h2>
						<figure>
							<i class="sprites default-user"></i>
							<?php //Html::img($chat->user->profile_pic(80, 80)) ?>
						</figure>
					</div>

					<div class="user-message">
					<!-- question sign
						<i class="sprites help-icon"></i>
					-->
						<p><?= $chat->description() ?></p>
						<p><?= Html::anchor("{$chat->url()}/edit", 'edit') ?></p>
					</div>

					<span>Purchase within</span>
					
					<?= Form::open(array('id' => 'purchase_within_form', 'action' => "quest/within/{$chat->id}")) ?>
						<?= Form::select('purchase_within', $chat->purchase_within(), Model_Chat::purchase_within_fields()) ?>
					<?= Form::close() ?>

					<div class="invites">

					<!-- Public/Private toggle
						<i class="sprites quest-toggle quest-private"></i>
					-->


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
									
									<?php foreach ($chat_product->get_comments() as $comment): ?>

										<div class="comment">
											
											<i style="background:url(<?= $comment->user->profile_pic(24,24) ?>);"></i>

											<p>

												<span class="name"><?= $comment->user->display_name() ?></span>
												
												<?= $comment->comment ?>
												
												<span class="date"><?= $comment->time_ago() ?></span>

											</p>
										</div>
										

									<?php endforeach; ?>
								</div>

								<div class="add-comment">
									<?= Form::open(array('action' => "{$chat->url()}/comment")) ?>
										<?= Html::img($user->profile_pic(24, 24)) ?>
										<input name="comment" type="text" autocomplete="off">
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
								<span class="product-price"><?= $product->price() ?></span>
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
						<h3>IN Chat</h3>
					</div>

					<div class="chat">
						
						<div class="scrollable">
							<ul>
								<?php foreach ($chat->get_messages() as $message): ?>
								<li class="<?= $message->user_is_owner($user->id) ? 'quest-owner' : null ?>">
									<span class="name">
										<?php //Html::img($message->user->profile_pic(20, 20)) ?>
										<?= $message->user->display_name() ?>
									</span>
									<p><?= $message->body ?></p>
									<span class="date"><?= $message->time_ago() ?></span>
								</li>
								<?php endforeach; ?>
							</ul>
						</div>

						<?= Form::open(array('action' => "quest/message/{$chat->id}", 'method' => 'POST', 'class' => 'reply')) ?>
							<textarea name="message" placeholder="Your message..." maxlength="140"></textarea>
							<button type="submit">Reply</button>
						</form>


					</div>

				</section>

				<div class="ads hidden"> <!-- will not have ads for now -->

					<div class="ad-100x100">100x100 ad</div>
					<div class="ad-100x100">100x100 ad</div>
					<div class="ad-100x100">100x100 ad</div>

				</div>


			</aside>



<div id="addnew-product" class="dialog">
	<h2>Add New Product</h2>

	<div class="addnew-form">
		<h3>Capture any product from the web</h3>
		<span class="how">How does this work?</span>

		<ul>
			<li>
				<form>
					<label>Enter a URL:</label>
					<input id="open_url_location" type="text">
					<button id="open_url" type="submit" class="btn green2">GO</button>
				</form>
			</li>
		</ul>

		<h4>Search With:</h4>
		<ul>
			<li>
				<form method="get" action="http://www.google.com/search" target="_blank">
					<label>Google:</label>
					<input name="q" type="text">
					<button type="submit" class="btn green2">GO</button>
				</form>
			</li>
			<li>
				<form method="get" action="http://www.bing.com/search"  target="_blank">
					<label>Bing:</label>
					<input nane="q" type="text">
					<button type="submit" class="btn green2">GO</button>
				</form>
			</li>
		</ul>

	</div>

	<div class="addnew-right">
		<h3>How do I add an item?</h3>

		<a href="javascript:(function(){var e=document.createElement('script');e.id='itemnation-script';e.src='http://itemnation.com/bookmark.js?cacheblock=' + Math.floor(Math.random() * 999999999);document.getElementsByTagName('head')[0].appendChild(e)})();"><span>Add To ItemNation</span></a>
	</div>

</div>

<div id="invite-friends" class="dialog">
	<h2>Invite Friends to Join Your Quest</h2>

	<h3>Invite a friend by email.</h3>

	<?= Form::open($chat->invite_url()) ?>
		<ul>
			<li>
				<label>From:</label>
				<input type="text" value="info@itemnation.com" disabled>
			</li>
			<li>
				<label>To:</label>
				<input name="to" type="text">
			</li>
			<li>
				<label>Subject:</label>
				<input name="subject" type="text" value="Help me find <?= $chat->name ?>">
			</li>
			<li>
				<label>Description:</label>
				<textarea name="description"><?= $chat->user->display_name() ?> is trying to find a <?= $chat->name ?> for them through ItemNation and has requested your input! Please click on the link below to see their page and join in the search. Thanks!</textarea>
			</li>
		</ul>

		<button type="submit" class="btn green2">SEND</button>
	</form>
</div>