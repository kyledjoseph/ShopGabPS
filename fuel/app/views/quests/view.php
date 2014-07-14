<div class='page-quest'>
		<h2><?= $quest->name ?></h2>
	  <div id="quest" class="row" data-quest-url="<?= $quest->url ?>">
	    <?php if ($quest->user->getClientModel() instanceof Model_Client && isset($user)) { ?>
	      <ol class="breadcrumb">
	        <li><a href="<?= Uri::create('/') ?>">Home</a></li>
	        <li><a href="<?= Uri::create('/client/'.$quest->user->getClientModel()->id) ?>"><?= $quest->user->display_name() ?></a></li>
	        <li class="active">Quest: <?= $quest->name ?></li>
	      </ol>
	    <?php } ?>
	  </div>

		<div class="row">
			<div class="col-12 col-sm-2">
				<h4><?= $quest->user->display_name() ?></h4>
			</div>
			<div class="col-12 col-sm-5 col-lg-6">
				<h4 class="help-me">Please help me find a <span class="product-name"><?= $quest->name() ?></span></h4>
			</div>
		</div>

		<div class="row">
			<div class="col-3 col-sm-2 col-lg-2">
				<img src="<?= $quest->user->get_avatar_uri(200, 200) ?>" width="90%" />
			</div>
			<div class="col-9 col-sm-5 col-lg-6">
				<div class="bubble">
					<p><?= $quest->description() ?></p>
					<?php if (isset($user) and $quest->belongs_to_user($user)): ?>
					<script type="text/javascript">
					var self_quest = true;
					</script>
					<?= Html::anchor('#questModal', 'Edit Quest', array('class' => '', 'data-toggle' => 'modal')) ?> |
					<?= Html::anchor('#deleteQuestModal', 'Delete Quest', array('class' => '', 'data-toggle' => 'modal')) ?>
					<?php endif; ?>
				</div>
			</div>

			<div class="col-12 col-sm-4 col-lg-3 col-sm-offset-1 align-center">
	      <div class="box marg-top">
	        <?= View::forge('quests/messages', array('quest' => $quest, 'messages' => $quest_messages)) ?>
	      </div>
			</div>
		</div>

		<div class="row">
			<div class="col-12 col-sm-8">
				<div class="box marg-top no-border">
					<?= View::forge('quests/products', array('quest' => $quest, 'quest_products' => $quest_products)) ?>
				</div>
			</div>
		</div>


</div>
  