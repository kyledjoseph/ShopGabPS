									<?php if (isset($user)): ?>
									
									
									<a href="<?= Uri::create($quest_product->like_url()) ?>" class="user_product_vote no-dec" title="<?= $quest_product->list_user_likes() ?>" data-product-id="<?= $quest_product->id ?>" data-vote-type="like">
										<span class="s-badge"><?= $quest_product->total_likes() ?></span>
										<i class="icon-thumbs-up-alt faded no-dec icon-large"></i>
									</a>									
									
									<a href="<?= Uri::create($quest_product->dislike_url()) ?>" class="user_product_vote no-dec" title="<?= $quest_product->list_user_dislikes() ?>" data-product-id="<?= $quest_product->id ?>" data-vote-type="dislike">
										<span class="s-badge"><?= $quest_product->total_dislikes() ?></span>
										<i class="icon-thumbs-down-alt faded no-dec icon-large"></i>
									</a>
									
									<?php else: ?>
									
									
									<a href="#loginModal" class="no-dec" data-toggle="modal">
										<span class="s-badge"><?= $quest_product->total_likes() ?></span>
										<i class="icon-thumbs-up-alt faded no-dec icon-large mx-rate"></i>
									</a> &nbsp;
																		
									<a href="#loginModal" class="no-dec" data-toggle="modal">
										<span class="s-badge"><?= $quest_product->total_dislikes() ?></span>
										<i class="icon-thumbs-down-alt faded no-dec icon-large mx-rate"></i>
									</a>

									<?php endif; ?>