<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'> 

    <title><?= isset($title) ? $title : 'ItemNation' ?></title>
    <?= Asset::css('main.css') ?>

    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
    
    <?php //Asset::js('bootstrap/bootstrap.js') ?>
    <?php //Asset::js('bootstrap/bootstrap-alert.js') ?>
    <?php //Asset::css('bootstrap.css') ?>

    <?= Asset::js('main.js') ?>
    <?= Casset::render_js() ?>
    <?= Casset::render_css() ?>
</head>

<body>

    <div id="wrap">
        <header>
            <div class="inner">
                <?= Html::anchor('/', '', array('title' => 'ItemNation', 'class' => 'sprites logo')) ?>

                <?php if (isset($mychats_logo) and $mychats_logo): ?>
                <i class="sprites quest-logo"></i>
            <?php endif; ?>

            <nav>
                <?php if (isset($user)): ?>

                <ul class="main-control">
                    <li class="<?= (isset($active_nav) and $active_nav == 'dashboard') ? 'current' : null ?>">
                        <?= Html::anchor('/', 'MY QUESTS') ?>
                    </li>
                        <!-- Remove until later
                        <li class="<?= (isset($active_nav) and $active_nav == 'wishlist') ? 'current' : null ?>">
                            <?= Html::anchor('wishlist', 'WISH LISTS') ?>
                        </li>
                        <li class="<?= (isset($active_nav) and $active_nav == 'myitems') ? 'current' : null ?>">
                            <?= Html::anchor('my/items', 'MY ITEMS') ?>
                        </li>
                    -->
                </ul>

                <ul class="user-control">
                    <li>
                        <span>
                            <i class="head-shot" style="background: url(<?= $user->profile_pic() ?>);"></i> 
                            <?= $user->display_name() ?>
                            <i class="sprites settings-icon"></i>
                        </span>
                    </li>
                </ul>

                <div class="user-menu">
                    <ul>
                        <li>
                            <?= Html::anchor('user/account', 'My Account') ?>
                        </li>
                        <li>
                            <?= Html::anchor('user/logout', 'Logout') ?>
                        </li>
                    </ul>
                </div>

            <?php else: // ! isset $user ?>

            <ul class="main-control">
                <li class="<?= (isset($active_nav) and $active_nav == 'login') ? 'current' : null ?>">
                    <?= Html::anchor('login', 'Login') ?>
                </li>
                <li class="<?= (isset($active_nav) and $active_nav == 'register') ? 'current' : null ?>">
                    <?= Html::anchor('register', 'Register') ?>
                </li>
            </ul>

        <?php endif; ?>
    </nav>

</div>
</header>

<div id="main">
    <div class="inner">

        <?php if (isset($notice)): ?>

        <div class="alert alert-<?= $notice->type ?>">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?= $notice->message ?>
        </div>

    <?php endif; ?>

                <!--
                <div id="pagination">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><span>Home &amp; Garden</span></li>
                    </ul>
                </div>
            -->

            <form id="search" class="hidden">
                <input type="text" placeholder="Search">
            </form>

            <div id="tabs" class="hidden">
                <ul>
                    <li class="<?= (isset($active_nav) and $active_nav == 'activity') ? 'current' : null ?>">
                        <i class="tab-r"></i>
                        <i class="tab-current-first-l"></i>
                        <i class="tab-current-r"></i>
                        <?= Html::anchor('/', 'Activity') ?>
                    </li>
                    <li class="<?= (isset($active_nav) and $active_nav == 'myitems') ? 'current' : null ?>">
                        <i class="tab-r"></i>
                        <i class="tab-current-l"></i>
                        <i class="tab-current-last-r"></i>
                        <?= Html::anchor('my/items', 'My Items') ?>
                    </li>
                    <li class="<?= (isset($active_nav) and $active_nav == 'wishlist') ? 'current' : null ?>">
                        <i class="tab-r"></i>
                        <i class="tab-current-l"></i>
                        <i class="tab-current-r"></i>
                        <?= Html::anchor('wishlist', 'Wish Lists') ?>
                    </li>

                </ul>
            </div>

            <?= isset($body) ? $body : null ?>

        </div>
    </div>
</div>


<footer>
    <div class="inner">

        <div class="footer-top">
            <div>
                <h3>Who are we?</h3>

                <ul>
                    <li>
                        <?= Html::anchor('about', 'About us') ?>
                    </li>
                    <li>
                        <?= Html::anchor('about/team', 'Our team') ?>
                    </li>
                    <li>
                        <a href="">ItemNation Blog</a>
                    </li>
                    <li>
                        <a href="">Contact us</a>
                    </li>


                </ul>   
            </div>

            <div>
                <h3>Connect with us.</h3>

                <script>
// $(function () {
//  $('.footer-social li a').click(function() {
//      return false;
//  });
// })
</script>

					<ul class="footer-social">
						<li>
							<a href="http://www.facebook.com/ItemNation">
								<i class="sprites footer-facebook"></i>
							</a>
						</li>
						<li>
							<a href="https://twitter.com/itemnation">
								<i class="sprites footer-twitter"></i>
							</a>
						</li>
						<li>
							<a href="">
								<i class="sprites footer-google"></i>
							</a>
						</li>
					</ul>
				</div>

				<div>
					<h3>Invite your friends</h3>

					<?= Form::open(array('action' => 'user/invite', 'method' => 'POST')) ?>
						<input name="emails" type="email" placeholder="yourfriend@email.com">
						<sub>* Add additional emails by a comma.</sub>
						<button type="submit">Invite Now</button>
					</form>


				</div>

			</div>

			<div class="footer-bottom">
				<span>&copy; <?php echo date('Y') ?> ItemNation. All rights reserved. <?= Html::anchor('privacy', 'Privacy Policy') ?> - <?= Html::anchor('terms', 'Terms of Use') ?></span>
				<i class="sprites footer-logo"></i>
			</div>



		</div>
	</footer>

	

	<!-- Overlay and Dialog -->
<div id="overlay"></div>


<!-- Overlay and Dialog -->
<div id="overlay">
</div>
    <div class="feedback_modal dialog">
            <h2>Feedback</h2>
        <div class="content feedback_clickable">
            <?= Form::open(array('action' => 'feedback', 'class' => 'form-horizontal')) ?>

            <?php if (! isset($user)): ?>
            <div class="control-group">
                <label class="control-label" for="user_email">Your Email</label>
                <div class="controls">
                    <input type="text" name="user_email" placeholder="Email">
                </div>
            </div>
        <?php endif; ?>

        <div class="control-group">
            <label class="control-label" for="feedback">Feedback</label>
            <div class="controls">
                <textarea name="feedback" placeholder="Feedback"></textarea>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <input name="referral_url" type="hidden" value="<?= Uri::current() ?>">
                <button type="submit" class="btn green2">Send Feedback</button>
            </div>
        </div>
    </div>
    <?= Form::close() ?>
</div>

<?= View::forge('analytics/site') ?>
<a href="#" class="feedback">
    <? echo Asset::img('feedback.png') ?>
</a>
</body>
</html>