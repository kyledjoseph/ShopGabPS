		<h2>analytics</h2>

		<?php foreach ($analytics->past_dates() as $date): ?>
			<li><?= Html::anchor("admin/analytics/report?start={$date}", $date) ?></li>
		<?php endforeach; ?>

		<hr>

		<h4>custom report</h4>

		<?= Form::open(array('action' => 'admin/analytics/custom')) ?>
			<?= Form::select('start_month', $analytics->todays_month(), $analytics->select_month()) ?>
			<?= Form::select('start_day', $analytics->todays_day(), $analytics->select_day()) ?>
			<?= Form::select('start_year', $analytics->todays_year(), $analytics->select_year()) ?>

			<span>to</span>

			<?= Form::select('until_month', $analytics->todays_month(), $analytics->select_month()) ?>
			<?= Form::select('until_day', $analytics->todays_day(), $analytics->select_day()) ?>
			<?= Form::select('until_year', $analytics->todays_year(), $analytics->select_year()) ?>

			<button type="submit" class="btn">generate</button>
		<?= Form::close() ?>