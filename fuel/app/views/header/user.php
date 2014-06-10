<div class="header">
	<!-- Logo -->
	<div class="col-4 col-sm-2">
		
		<div class='logo'><a href="/"><img class="logo-img" src="<?= $user->get_logo_uri() ?>" alt="ShopGab" /></a></div>

    <?php if ($user->group == Model_User::CLIENT_GROUP_ID) { ?>
      <h4>Your stylist: <?= $user->getParentUser()->display_name() ?> <img class="force-32-32" src="<?= $user->getParentUser()->get_avatar_uri() ?>" /></h4>
    <?php } ?>
	</div>

	<!-- Navigation -->
	<div class="col-8 col-sm-10">
		<ul class="landing-nav pull-right">
			<li><?= Html::anchor('/', 'My Quests') ?></li>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">
					<img class="force-32-32" src="<?= $user->get_avatar_uri() ?>" /><span><?= $user->display_name() ?></span>
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