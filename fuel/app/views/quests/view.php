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
	  <div class='row'>
	  	<div class='col-12'>
	  		<div class="row">

	  			<div class="col-12 col-sm-7">
	  					<div class="row box marg-top no-border">
	  						<?= View::forge('quests/products', array('quest' => $quest, 'quest_products' => $quest_products)) ?>
	  					</div>
	  			</div>

	  			<div class="col-12 col-sm-5 pad-top right-sidebar">
  					<div class="col-4 col-sm-4 col-lg-4 client">
  						<img src="<?= $quest->user->get_avatar_uri(200, 200) ?>" />
  						<h4><?= $quest->user->display_name() ?></h4>
  					</div>	  				
  					<div class="col-8 col-sm-8 col-lg-8">
  						<div class="bubble">
  							<h4 class="help-me"><?= $quest->name() ?></h4>
  							<p><?= $quest->description() ?></p>
  							<?php if (isset($user) and $quest->belongs_to_user($user)): ?>
  						</div>
  						<div class="controls">
  							<script type="text/javascript">
  							var self_quest = true;
  							</script>
  							<?= Html::anchor('#questModal', 'Edit Quest', array('class' => '', 'data-toggle' => 'modal')) ?> |
  							<?= Html::anchor('#deleteQuestModal', 'Delete Quest', array('class' => '', 'data-toggle' => 'modal')) ?>
  							<?php endif; ?>
  						</div>
	  				</div>


	  				<div class="col-12">
	  					<div class='chat-wrap'>
	  						<div class="box marg-top">
	  						  <?= View::forge('quests/messages', array('quest' => $quest, 'messages' => $quest_messages)) ?>
	  						</div>
	  					</div>	  		     
	  				</div>
	  			</div>

	  		</div>
	  	</div>
	  </div>
	  

</div>
