	<div class="container">
		<div class="col-12 col-sm-2">
			<h4><?= $quest->user->display_name() ?></h4>
		</div>
		<div class="col-12 col-sm-5 col-lg-6">
			<h4 class="help-me">Please help me find a <span class="product-name"><?= $quest->name() ?></span></h4>
		</div>
		<div class="col-12 col-sm-5 col-lg-4">
			<button id="private-public" class="hidden btn btn-primary btn-block marg-bottom quest-private"><i class="icon-lock icon-large"></i>&nbsp;&nbsp;&nbsp;Private</button>
		</div>
	</div>

	<div class="container">
		<div class="col-2">
			<img src="<?= $quest->user->get_avatar_uri(200, 200) ?>" width="100%" />
		</div>
		<div class="col-10 col-sm-5 col-lg-6">
			<div class="bubble">
				<p><?= $quest->description() ?></p>
				<?php if (isset($user) and $quest->belongs_to_user($user->id)): ?>
					<?= Html::anchor('#questModal', 'Edit Quest', array('class' => '', 'data-toggle' => 'modal')) ?> |
					<?= Html::anchor('#deleteQuestModal', 'Delete Quest', array('class' => '', 'data-toggle' => 'modal')) ?> 
				<?php endif; ?>
			</div>
		</div>

		<div class="col-12 col-sm-5 col-lg-4 align-center">
			<?php if (isset($user) and $quest->belongs_to_user($user->id)): ?>
			<div class="pushups">
				<button id="fb_share" class="marg-bottom push-center btn btn-fb btn-block push-center quest-invite"
				data-picture="<?= $quest->default_thumb_url() ?>"
				data-link="<?= $quest->full_url() ?>"
				data-name="Help me find a <?= $quest->name ?>"
				data-caption="ShopGab - Shop Socially!"
				data-description="<?= $user->display_name() ?> is trying to find a <?= $quest->name ?> through ShopGab and has requested your input! Please click on the link below to see their page and join in the search. Thanks!"><i class="icon-facebook icon-large"></i>&nbsp;&nbsp;&nbsp;Post to timeline</button>

				<button id="fb_invite" class="btn btn-primary btn-fb btn-block push-center quest-message" href="" data-link="<?= $quest->full_url() ?>"><i class="icon-facebook icon-large"></i>&nbsp;&nbsp;&nbsp;Message friends</button>							
			</div>
			<?php endif; ?>
		</div>

		<div class="col-12">
			<div class="purchase-within">
				Purchase within:
				<?= Form::open(array('id' => 'purchase_within_form', 'class' => 'inline-block submit-on-change', 'action' => $quest->url('within'))) ?>
					<?= Form::select('purchase_within', $quest->purchase_within_option(), Model_Quest::purchase_within_fields(), array('class' => 'form-control')) ?>
				<?= Form::close() ?>
				<span class="faded"><?= $quest->purchase_within !== '0' ? "({$quest->purchase_within()}) days" : '' ?></span>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="col-12 col-sm-8">
			<div class="box marg-top">
				<h4>Products</h4>
				
				<?php if ($total_products > 0): ?>
				<?= Form::open(array('id' => 'sort_quest_by', 'class' => 'pull-right sort-by inline-block submit-on-change', 'method' => 'GET', 'action' => $quest->url())) ?>
					<?= Form::select('order', $quest->active_sort(), $quest->sort_options(), array('class' => 'form-control')) ?>
				<?= Form::close() ?>
				<div class="clear pad-bottom"></div>
				<?php endif; ?>
		
				<div class="row">
					<?php $product_i = 1; foreach ($quest_products as $quest_product): ?>
					<?php $product = $quest_product->product ?>

					<div class="col-12 col-sm-6 col-lg-4 quest-item no<?= ! $quest_product->was_added_by_owner() ? 'from-tab' : null ?>" data-product="<?= $product_i ?>">
						<div class="quest-box">
							<a href="<?= $product->product_url() ?>" target="_blank">
								<img src="<?= $product->image_url(250, 220) ?>" width="100%" alt="<?= $product->name() ?>" />
								<div class="text"><?= $product->name() ?></div>
							</a>
							<div class="text"><?= $product->price() ?></div>
							<div class="text">
								<?php if (isset($user)): ?>
								<span class="badge"><?= $quest_product->total_likes() ?></span> <?= Html::anchor($quest_product->like_url(), '<i class="icon-thumbs-up-alt faded no-dec icon-large"></i>', array('title' => $quest_product->list_user_likes(), 'class' => 'user_product_vote')) ?> &nbsp; 
								<span class="badge"><?= $quest_product->total_dislikes() ?></span> <?= Html::anchor($quest_product->dislike_url(), '<i class="icon-thumbs-down-alt faded no-dec icon-large"></i>', array('title' => $quest_product->list_user_dislikes(), 'class' => 'user_product_vote')) ?>
								<?php else: ?>
								<span class="badge"><?= $quest_product->total_likes() ?></span> <a href="#registerModal" data-toggle="modal"><i class="icon-thumbs-up-alt faded no-dec icon-large"></i></a> &nbsp; 
								<span class="badge"><?= $quest_product->total_dislikes() ?></span> <a href="#registerModal" data-toggle="modal"><i class="icon-thumbs-down-alt faded no-dec icon-large"></i></a>
								<?php endif; ?>
							</div>
							
							<div class="text">
								<?php if (isset($user) and $quest->belongs_to_user($user->id)): ?>
								<a href="<?= $quest_product->remove_url() ?>">Remove product</a>
								<?php endif; ?>
							</div>
		
							<?php if (isset($user)): ?>
							<div class="text comments"><a href="#"><?= $quest_product->total_comments_text() ?></a> </div>
							<?php else: ?>
							<div class="text"><a href="#registerModal"><?= $quest_product->total_comments_text() ?></a></div>
							<?php endif; ?>

							<?php foreach ($quest_product->get_comments() as $comment): ?>
							<div class="comment text" style="display:none">
								<div class="name"><?= $comment->user->display_name() ?></div>
								<?= $comment->comment ?>
								<div class="time"><?= $comment->time_ago() ?></div>
							</div>
							<?php endforeach; ?>



							<?= Form::open(array('action' => $quest_product->comment_url(), 'class' => 'comment', 'style' => 'display:none')) ?>
							<div class="input-group">
								<input name="comment" type="text" class="form-control" placeholder="What do you think?">
								<span class="input-group-btn">
									<button class="btn btn-default" type="submit">Comment</button>
								</span>
							</div>
							<?= Form::close() ?>
							
						</div>

						<?php if (! $quest_product->was_added_by_owner()): ?>
							<h5>Added by <?= $quest_product->user->display_name() ?></h5>
						<?php endif; ?>
					</div>

					<?php $product_i++; endforeach; ?>

					<div class="col-12 col-sm-6 col-lg-4">
						<?php if (isset($user)): ?>
						<?php if ($quest->belongs_to_user($user->id)): ?>
							<a href="#addProductModal" class="quest-add-product" data-toggle="modal" data-container="body" data-placement="top" data-content="Learn how to add products to your quest with our bookmarklet!" data-original-title="" title="">
							<?php else: ?>
							<a href="#addProductModal" class="" data-toggle="modal">
							<?php endif; ?>
						<?php else: ?>
						<a href="#registerModal" class="" data-toggle="modal">
						<?php endif; ?>
						<img src="/assets/img/add-product.png" width="100%" />
						</a>
					</div>
				</div>
			</div>
		</div>


		<div class="col-12 col-sm-4">
			<div class="box marg-top">
				<h4>Participants</h4>
				<?= Html::anchor('friends/refresh', '+ Invite', array('class' => 'corner-button btn btn-medium btn-success')) ?>
				<div class="content">
					<?php foreach ($quest->get_participants() as $participant): ?>
					<div class="friend-box">
						<div class="media">
							<a class="pull-left" href="#">
								<img class="media-object force-32-32" src="<?= $participant->user->get_avatar_uri() ?>" />
							</a>
							<div class="media-body">
								<strong><?= $participant->user->display_name() ?></strong>  - <?php // Html::anchor("friends/hide/{$friendship->id}", 'Remove', array('class' => 'remove')) ?>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="box marg-top">
				<h4>Chat</h4>
				<div class="row">
					<div class="col-12">
						<div class="chat">
							<?php if (empty($quest_messages)): ?>
							<div class="message">No messages</div>
							<?php else: ?>
							<?php foreach ($quest_messages as $message): ?>
							<div class="message">
								<div class="name"><?= $message->user->display_name() ?></div>
								<div class="content">
									<?= $message->body ?>
									<div class="time"><?= $message->time_ago() ?></div>
								</div>
							</div>
							<?php endforeach; ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-12">
						<?= Form::open(array('action' => $quest->url('message'))) ?>
							<div class="input-group">
								<input name="message" type="text" class="form-control">
								<span class="input-group-btn">
									<?php if (isset($user)): ?>
									<button class="chat-button btn btn-default" type="submit">Send</button>
									<?php else: ?>
									<button href="#registerModal" class="btn btn-default" data-toggle="modal">Send</button>
									<?php endif; ?>
								</span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>