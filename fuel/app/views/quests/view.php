	<div class="container">
		<div class="col-12 col-sm-2">
			<h4><?= $quest->user->display_name() ?></h4>
		</div>
		<div class="col-12 col-sm-10">
			<h4 class="help-me">Please help me find a <span class="product-name"><?= $quest->name() ?></span></h4>
		</div>
	</div>

	<div class="container">
		<div class="col-2">
			<?= Html::img($quest->user->get_avatar_uri(200, 200), array('width' => 100, 'height' => 100)) ?>
		</div>
		<div class="col-10 col-sm-6">
			<div class="bubble">
				<p><?= $quest->description() ?></p>
				<?php if (isset($user) and $quest->belongs_to_user($user->id)): ?>
				<?= Html::anchor('#questModal', 'Edit Quest', array('class' => '', 'data-toggle' => 'modal')) ?> |
				<?= Html::anchor('#deleteQuestModal', 'Delete Quest', array('class' => '', 'data-toggle' => 'modal')) ?> 
				<?php endif; ?>
			</div>

			<div class="purchase-within">
				Purchase within:
				<?= Form::open(array('id' => 'purchase_within_form', 'class' => 'inline-block submit-on-change', 'action' => $quest->url('within'))) ?>

				<?= Form::select('purchase_within', $quest->purchase_within_option(), Model_Quest::purchase_within_fields(), array('class' => 'form-control')) ?>
				
				<?= Form::close() ?>
				<span class="faded"><?= $quest->purchase_within !== '0' ? "({$quest->purchase_within()}) days" : '' ?></span>
			</div>
		</div>
		<div class="col-12 col-sm-4 align-center">
			<div class="btn-group pad-bottom hidden">
				<?= Html::anchor($quest->url('access/public'), 'Public', array('class' => "btn btn-default " . ($quest->is_public() ? ' active' : null))) ?>
				<?= Html::anchor($quest->url('access/private'), 'Private', array('class' => "btn btn-default " . (! $quest->is_public() ? ' active' : null))) ?>
			</div>


			<?php if (isset($user) and $quest->belongs_to_user($user->id)): ?>
			<button href="#inviteModal" class="btn btn-success btn-large block push-center invite-btn quest-invite" data-toggle="modal">Invite friends</button>
			<?php endif; ?>
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
				<div class="clear"></div>
				<?php endif; ?>
				
				<?php $product_i = 1; foreach ($quest_products as $quest_product): ?>
				<?php $product = $quest_product->product ?>

				<div class="product-block <?= ! $quest_product->was_added_by_owner() ? 'from-tab' : null ?>" data-product="<?= $product_i ?>">
					<div class="media">
						<div class="pull-left">
							<?= Html::img($product->image_url(), array('alt' => $product->name())) ?>
						</div>

						<div class="info media-body">
							<div class="name"><a href="<?= $product->product_url() ?>" target="_blank"><?= $product->name() ?></a></span></div>
							<span class="price"><?= $product->price() ?></span>
							<span class="description"><?= $product->description() ?></span>
							<div>
								<?php if (isset($user)): ?>
								<a href="#" class="comments"><?= $quest_product->total_comments_text() ?></a>
								<?php else: ?>
								<a href="#loginModal" data-toggle="modal"><?= $quest_product->total_comments_text() ?></a>
								<?php endif; ?>
							</div>


							<?php foreach ($quest_product->get_comments() as $comment): ?>
							<div class="comment" style="display:none">
								<span class="name"><?= $comment->user->display_name() ?></span>
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
							</form>
						</div>

						<div class="options media-body">
							<div class="score">
								<?php if (isset($user)): ?>
								<span class="badge"><?= $quest_product->total_likes() ?></span> <?= Html::anchor($quest_product->like_url(), '<i class="icon-thumbs-up-alt faded no-dec icon-large"></i>', array('title' => $quest_product->list_user_likes(), 'class' => 'user_product_vote')) ?> &nbsp; 
								<span class="badge"><?= $quest_product->total_dislikes() ?></span> <?= Html::anchor($quest_product->dislike_url(), '<i class="icon-thumbs-down-alt faded no-dec icon-large"></i>', array('title' => $quest_product->list_user_dislikes(), 'class' => 'user_product_vote')) ?>
								
								<?php else: ?>
								<span class="badge"><?= $quest_product->total_likes() ?></span> <a href="#loginModal" data-toggle="modal"><i class="icon-thumbs-up-alt faded no-dec icon-large"></i></a> &nbsp; 
								<span class="badge"><?= $quest_product->total_dislikes() ?></span> <a href="#loginModal" data-toggle="modal"><i class="icon-thumbs-down-alt faded no-dec icon-large"></i></a>
								<?php endif; ?>
								
								<?php if (isset($user) and $quest->belongs_to_user($user->id)): ?>
								<a href="<?= $quest_product->remove_url() ?>" class="btn btn-danger pull-right" data-toggle="modal">&times;</a>
								<?php endif; ?>
							</div>
						
							<div class="marg-top">
								<?php if (isset($user)): ?>
								<?= Html::anchor($product->product_url(), 'Where can I buy this?', array('class' => 'btn btn-warning pull-right', 'target' => '_blank')) ?>
								<?php else: ?>
								<a href="#loginModal" class="btn btn-warning" data-toggle="modal">Where can I buy this?</a>
								<?php endif; ?>
							</div>
						</div>

						<div class="product-number">
							<span><?= $product_i ?></span>
						</div>

						<?php if (! $quest_product->was_added_by_owner()): ?>
						<h5>Added by <?= $quest_product->user->display_name() ?></h5>
						<?php endif; ?>
					</div>

					<!--<div class="btn-group">
	  					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
	 					   <span class="caret"></span>
	 					 </a>
						<ul class="dropdown-menu">
	 						<li><a href="#">Add to Wishlist</a></li>
	    					<li><a href="#">Add to My Items</a></li>
	  					</ul>
	  				</div>-->
	  			</div>

				<?php $product_i++; endforeach; ?>

	  			<?php if (isset($user)): ?>
		  			<?php if ($quest->belongs_to_user($user->id)) { ?>
		  			<button href="#addProductModal" class="corner-button btn btn-medium btn-success quest-add-product" data-toggle="modal">+ Add Product</button>
		  			<?php } else { ?>
		  			<button href="#addProductModal" class="corner-button btn btn-medium btn-success" data-toggle="modal">+ Recommend Product</button>
	  				<?php } ?>
	  			<?php else: ?>
	  			<button href="#loginModal" class="corner-button btn btn-small btn-success" data-toggle="modal">+ Add Product</button>
	  			<?php endif; ?>

			</div>
		</div>

		<div class="col-12 col-sm-4">
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
									<button class="btn btn-default" type="submit">Send</button>
									<?php else: ?>
									<button href="#loginModal" class="btn btn-default" data-toggle="modal">Send</button>
									<?php endif; ?>
								</span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>$(".chat").scrollTop($(".chat")[0].scrollHeight);</script>