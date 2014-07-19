											<div class="comment text">												
												<div class="content">
													
													<div class="message"><?= $comment->comment ?></div>
													
													<div class='data'>
														<span class="time"><?= $comment->time_ago() ?></span> | 
														<span class="name"><?= $comment->user->display_name() ?></span>
													</div>													
													
												</div>
											</div>