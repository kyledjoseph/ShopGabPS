
			<div class="row">
				<div class="span2 ">
					<h4><?= $quest->user->display_name() ?></h4>
				</div>
				<div class="span10">
					<h4 class="help-me">Please help me find a <span class="product-name"><?= $quest->name() ?></span></h4>
				</div>
			</div>
			
			<div class="row">
				<div class="span2">
					<?= Html::img($quest->user->profile_pic(100, 100)) ?>
				</div>
				<div class="span6">
					<div class="bubble">
						<p><?= $quest->description() ?></p>
						<?php if ($quest->belongs_to_user($user->id)): ?>
						<?= Html::anchor('#questModal', 'Edit Quest', array('class' => '', 'data-toggle' => 'modal')) ?> | 
						
						<?= Html::anchor($quest->delete_url(), 'Delete Quest') ?>
						<?php endif; ?>
					</div>
					
					<div class="purchase-within">
						Purchase within:
						<?= Form::open(array('id' => 'purchase_within_form', 'action' => $quest->within_url())) ?>
							<?= Form::select('purchase_within', $quest->purchase_within(), Model_Quest::purchase_within_fields()) ?>
						<?= Form::close() ?>
					</div>
				</div>
			
				<div class="span4 align-center">
					<button href="#inviteModal" class="btn btn-success btn-block btn-large" data-toggle="modal">Invite friends</button>
					<a class="view-friends" href="#">View Friends</a>
				</div>
			</div>

			<div class="row">
				<div class="span8">
					<div class="box">
						<h4>Products</h4>

						<?php foreach ($quest->get_quest_products() as $quest_product): ?>
						<?php $product = $quest_product->product ?>

						<div class="product-block <?= ! $quest_product->was_added_by_owner() ? 'from-tab' : null ?>">
							
							<div class="image inline-block">
								<?= $product->small_html() ?>
							</div>

							<div class="info">
								<div class="name">
									<span><?= $product->name() ?></span>
								</div>
								<span class="price"><?= $product->price() ?></span>
								
								<div class="comments"><a href="#"><?= $quest_product->total_comments_text() ?></a></div>
								
								<?php foreach ($quest_product->get_comments() as $comment): ?>

								<div class="comment" style="display:none">
									<span class="name"><?= $comment->user->display_name() ?></span>
									<?= $comment->comment ?>
									<div class="time"><?= $comment->time_ago() ?></div>
								</div>
								
								<?php endforeach; ?>

								<?= Form::open(array('action' => $quest_product->comment_url(), 'class' => 'comment input-append', 'style' => 'display:none')) ?>
									<input name="comment" type="text" placeholder="What do you think?"/>
									<button class="btn" type="submit">Comment</button>
								</form>
								

							</div>

							<div class="details">
								<div class="score">
									<?= $quest_product->total_upvotes() ?> <?= Html::anchor($quest_product->like_url(), '<i class="icon-circle-arrow-up faded"></i>') ?> &nbsp; 
									<?= $quest_product->total_downvotes() ?> <?= Html::anchor($quest_product->dislike_url(), '<i class="icon-circle-arrow-down faded"></i>') ?>
								</div>

								<?= Html::anchor($product->product_url(), 'Where can I find this?', array('class' => 'btn btn-warning', 'target' => '_blank')) ?>
								<?php if ($quest->belongs_to_user($user->id)): ?>
								<?= Html::anchor($quest_product->remove_url(), 'Remove') ?>
								<?php endif; ?>
			
							</div>
								
							<div class="product-number">
								<span><?= $product_i ?></span>
							</div>

							<?php if (! $quest_product->was_added_by_owner()): ?>
							<h5>Added by <?= $quest_product->user->display_name() ?></h5>
							<?php endif; ?>
								
						</div>

						<?php $product_i++; endforeach; ?>

						<button href="#addProductModal" class="add-product btn btn-small btn-success" data-toggle="modal">Add Product</button>
					</div>
				</div>
			
				<div class="span4">
					<div class="box">
						<h4>Chat</h4>
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

							
							<?= Form::open(array('action' => $quest->message_url(), 'class' => 'input-append')) ?>
								<input name="message" class="block" id="appendedInputButton" type="text">
								<button class="btn" type="submit">Send</button>
							</form>
						</div>
					</div>
				</div>
			</div>