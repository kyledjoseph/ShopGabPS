			<div class="page-header no-border clearfix">
				<div class="row">
					<div class="span4 header-left">
						<?= Html::anchor('/', Asset::img('full-logo.png')) ?>
					</div>
					<div class="span7 offset1 header-right">
						<ul class="site-nav nav nav-pills pull-right">
							<li><?= Html::anchor('/', 'My Quests') ?></li>
							<li class="nav-image">
								<?= Html::anchor('account', Html::img($user->get_avatar_uri()) . $user->display_name()) ?>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">
									<i class="icon-wrench faded"></i>
								</a>
								<ul class="dropdown-menu">
									<li><?= Html::anchor('account', 'Account') ?></li>
									<li><?= Html::anchor('logout', 'Logout') ?></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>