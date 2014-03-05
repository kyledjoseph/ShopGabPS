	<ul class="nav nav-tabs">
		<li class="<?= (isset($active) and $active == 'index') ? 'active' : null ?>">
			<?= Html::anchor('admin/logs', 'Index') ?>
		</li>
		<li class="<?= (isset($active) and $active == 'errors') ? 'active' : null ?>">
			<?= Html::anchor('admin/logs/errors', 'Errors') ?>
		</li>
		<li class="<?= (isset($active) and $active == 'email') ? 'active' : null ?>">
			<?= Html::anchor('admin/logs/email', 'Email') ?>
		</li>
		<li class="<?= (isset($active) and $active == 'bookmark') ? 'active' : null ?>">
			<?= Html::anchor('admin/logs/bookmark', 'Bookmark Errors') ?>
		</li>
	</ul>