<div class="header row">
	<!-- Logo -->
	<div class="col-4 col-sm-2">
		<h1><a href="/"><img class="logo-img" src="/assets/img/logo.png" alt="ShopGab" /></a></h1>
	</div>

	<!-- Navigation -->
	<div class="col-8 col-sm-10">
		<ul class="landing-nav nav nav-pills pull-right">
			<li><?= Html::anchor('/', 'My Quests') ?></li>
			<li class="nav-image hide-overflow">
				<a href="/account"><img class="force-32-32" src="<?= $user->get_avatar_uri() ?>" /> <?= $user->display_name() ?></a>
			</li>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">
					<i class="icon-wrench faded"></i>
				</a>
				<ul class="dropdown-menu dropdown-left">
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
    "$email": "<?= $user->email ?>",
    "$last_login": new Date()
});
</script>


