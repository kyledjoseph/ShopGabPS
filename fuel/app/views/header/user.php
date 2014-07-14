<div class="header">
	<!-- Logo -->
	<div class="pull-left">
		
		<div class='logo'><a href="/"><img class="logo-img" src="<?= $user->get_logo_uri() ?>" alt="ShopGab" /></a></div>

	</div>

	<!-- Navigation -->
	<div class="pull-right">
		<ul class="landing-nav pull-right">
			<li class='quests'><?= Html::anchor('/', $user->group == Model_User::PROFESSIONAL_GROUP_ID ? 'Clients Quests' : 'My Quests') ?></li>
			<li class="dropdown profile">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">
					<span><?= $user->display_name() ?></span><img class="force-32-32" src="<?= $user->get_avatar_uri() ?>" />
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