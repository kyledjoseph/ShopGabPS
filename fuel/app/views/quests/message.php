							<div class="message">

									<div class="content ">
										
										<?= $message->body ?>

										<div class='data'>
											<span class="time"><?= $message->time_ago() ?></span> | 
											<span class="name"><?= $message->user->display_name() ?></span>
										</div>	
									</div>																							

							</div>