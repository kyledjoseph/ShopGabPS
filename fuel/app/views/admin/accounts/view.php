
		<ul class="breadcrumb">
			<li><?= Html::anchor('admin/accounts', 'Accounts') ?></li>
			<li class="active"><?= $account->display_name() ?></li>
		</ul>

		<h2><?= $account->display_name() ?></h2>
		<hr>
	
		<p>
			<?= Html::anchor("admin/accounts/edit/{$account->id}", 'edit this account', array('class' => 'btn btn-primary')) ?>
      <?php if ($account->group == Model_User::PROFESSIONAL_GROUP_ID) { ?>
        <?= Html::anchor("admin/accounts/professional/{$account->id}", 'edit pricing data', array('class' => 'btn btn-primary')) ?>
        <?= Html::anchor("admin/accounts/pricing/{$account->id}", 'edit monthly price', array('class' => 'btn btn-primary')) ?>
      <?php } elseif ($account->group == Model_User::CLIENT_GROUP_ID) { ?>
        <?= Html::anchor("admin/accounts/client/{$account->id}", 'edit client data', array('class' => 'btn btn-primary')) ?>
      <?php } ?>
      <?= Html::anchor("admin/accounts/delete/{$account->id}", 'delete this account', array('class' => 'btn btn-danger delete_account')) ?>
		</p>
		<hr>

    <h2>Avatar Image</h2>
    <img class="force-200-200" src="<?= $account->get_avatar_uri(200,200) ?>" />

    <hr />
    
    <h2>Logo Image</h2>
    <img class="" src="<?= $account->get_logo_uri() ?>" />

    <hr />

		<h2>Account Information</h2>
		<table class="table table-striped">
			<tbody>
				<tr>
					<td>Email</td>
					<td><?= Html::mail_to($account->email) ?></td>
				</tr>

				<tr>
					<td>Display name</td>
					<td><?= $account->display_name() ?></td>
				</tr>

        <tr>
          <td>Account type</td>
          <td><?= $account->getVerboseAccountType() ?></td>
        </tr>

        <?php if ($account->group == Model_User::PROFESSIONAL_GROUP_ID) { ?>
          <tr>
            <td>Plan type</td>
            <td><?= $account->getProfessionalModel()->getVerbosePricingPlanType() ?></td>
          </tr>
          <tr>
            <td>Number of days left on plan</td>
            <td><?= $account->getProfessionalModel()->getSubscriptionDaysLeft() ?></td>
          </tr>
          <tr>
            <td>Monthly price for this user</td>
            <td>$ <?= $account->getProfessionalModel()->getPrice() ?></td>
          </tr>
        <?php } elseif ($account->group == Model_User::CLIENT_GROUP_ID) { ?>
          <tr>
            <td>Professional ID</td>
            <td><?= Html::anchor('admin/accounts/view/'.$account->getClientModel()->parent_id, $account->getClientModel()->parent_id) ?></td>
          </tr>
        <?php } ?>

				<tr>
					<td>Member since</td>
					<td><?= $account->member_since() ?></td>
				</tr>

				<tr>
					<td>Last login</td>
					<td><?= $account->last_login() ?></td>
				</tr>
			</tbody>
		</table>
		<hr>

		<h2>User Quests</h2>
		<table class="table table-striped">
			<thead>
				<th>name</th>
				<th>created</th>
				<th>&nbsp;</th>
			</thead>

			<tbody>

				<?php foreach ($account->get_quests() as $quest): ?>
				
				<tr>
					<td><?= Html::anchor($quest->url(), $quest->name) ?></td>
					<td><?= $quest->date() ?></td>
					<td><?= Html::anchor("admin/accounts/delete_quest/{$account->id}/{$quest->id}", 'delete', ['class' => 'remove_quest']) ?></td>
				</tr>

				<?php endforeach; ?>

			</tbody>
		</table>

    <script>
      $('a.delete_account').click(function() {
        return confirm('Delete this account?');
      });

      $('a.remove_quest').click(function() {
        return confirm('Delete this quest?');
      });
    </script>
