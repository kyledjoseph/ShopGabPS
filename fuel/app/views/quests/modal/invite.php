	<div class="modal fade" id="inviteModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Invite Friends</h4>
				</div>
				<div class="modal-body">
					<ul id="myTab" class="nav nav-tabs">
						<?php if (($user->is_authenticated_with('facebook')) || 1==1): ?>
						<li class="active"><a href="#facebook" data-toggle="tab">Facebook</a></li>
						<?php endif; ?>
						<li><a href="#email" data-toggle="tab">Email</a></li>
					</ul>

					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade in" id="friends">
							<?= Form::open(array('id' => 'invite_friends', 'action' => $quest->url('invite/friends'), 'class' => '')) ?>
								<div class="row">
									<div class="col-12 col-sm-6">
										<h3>Friends on ShopGab</h3>
										<?php foreach ($user->get_friendships() as $friendship): ?>
										<div class="checkbox">
											<label>
												<input type="checkbox" class="select_sg_friend" name="sg_friends[]" value="<?= $friendship->id ?>"> 
												<?= Html::img($friendship->friend->get_avatar_uri()) ?> <?= $friendship->friend->display_name() ?>
											</label>
										</div>
										<?php endforeach; ?>
									</div>
									<div class="col-12 col-sm-6 invite-friends-container">
										
										<h3>Friends on Facebook</h3>
										<div id="facebook-friends" class="media">
											
										</div>
										
									</div>
								</div>
								<div class="modal-footer">
									<button id="submit_invite_friends" class="btn btn-primary">Invite</button>
									<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
								</div>
							<?= Form::close() ?>
						</div>



						<div class="tab-pane fade in active" id="facebook">
							
							<img id="fb_share" class="push-center" src="/assets/img/share-with-friends.png"
								data-picture="<?= $quest->default_thumb_url() ?>"
								data-link="<?= $quest->full_url() ?>"
								data-name="Help me find a <?= $quest->name ?>"
								data-caption="ShopGab - Shop Socially!"
								data-description="<?= $user->display_name() ?> is trying to find a <?= $quest->name ?> through ShopGab and has requested your input! Please click on the link below to see their page and join in the search. Thanks!"/>
							<p>
								or <a id="fb_invite" href="" 
									data-link="<?= $quest->full_url() ?>">send a message to one or more friends</a>
							<p>

						</div>



						<div class="tab-pane fade invite-friends-container" id="email">
							<?= Form::open(array('action' => $quest->url('invite/email'), 'class' => '')) ?>
								<div class="modal-slice">
									<div class="form-group">
										<label class="control-label" for="inputFrom">From:</label>
										<div class="from-email">info@shopgab.com</div>
									</div>
									<div class="form-group">
										<label class="control-label" for="to">To:</label>
										<input type="text" class="form-control" name="to" id="inputTo" placeholder="yourfriend@email.com">
									</div>
									<div class="form-group">
										<label class="control-label" for="subject">Subject:</label>
										<input type="text" class="form-control" name="subject" id="inputSubject" placeholder="Subject" value="Help me find a <?= $quest->name ?>">
									</div>
									<div class="form-group">
										<label class="control-label" for="description">Description</label>
										<textarea class="form-control" name="description" rows="7"><?= $user->display_name() ?> is trying to find a <?= $quest->name ?> through ShopGab and has requested your input! Please click on the link below to see their page and join in the search. Thanks!</textarea>
									</div>
									<button class="btn btn-primary">Invite</button>
								</div>
								<div class="modal-footer">									
									<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>