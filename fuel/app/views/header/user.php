<div class="header container">
	<!-- Logo -->
	<div class="col-4 col-sm-2">
		<h1><a href="/"><img src="/assets/img/logo.png" alt="ShopGab" /></a></h1>
	</div>

	<!-- Navigation -->
	<div class="col-8 col-sm-10">
		<ul class="landing-nav nav nav-pills pull-right">
			<li><?= Html::anchor('/', 'My Quests') ?></li>
			<li class="nav-image">
				<?= Html::anchor('account', Html::img($user->get_avatar_uri()) . ' ' . $user->display_name()) ?>
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

<script type="text/javascript">
mixpanel.identify("<?= $user->email ?>");
mixpanel.people.set({
    "$email": "me@christianbundy.com",
    "$last_login": new Date(),
});
</script>

