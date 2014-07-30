											<div class="comment text">												
												<div class="content">
													<div class="message<?php if ($comment->user->getProfessionalModel()) echo ' professional' ?>"><?= $comment->comment ?></div>
													
													<div class='data'>
														<span class="time"><?= $comment->time_ago() ?></span> | 
														<span class="name"><?= $comment->user->display_name() ?></span>
													</div>													
													
												</div>
											</div>