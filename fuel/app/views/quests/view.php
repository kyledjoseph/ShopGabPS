	<div id="quest" data-quest-url="<?= $quest->url ?>"></div>

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
			<div class="purchase-within">
				Purchase within:
				<?= Form::open(array('id' => 'purchase_within_form', 'class' => 'inline-block submit-on-change', 'action' => $quest->url('within'))) ?>
				<?= Form::select('purchase_within', $quest->purchase_within_option(), Model_Quest::purchase_within_fields(), array('id' => 'purchase_within_value', 'class' => 'form-control')) ?>
				<?= Form::close() ?>
				<span id="purchase_within_text" class="faded"><?= $quest->purchase_within !== '0' ? $quest->purchase_within_text() : null ?></span>
			</div>
		</div>

		<div class="col-12 col-sm-4 col-lg-3 col-sm-offset-1 align-center">
			<?php if (isset($user) and $quest->belongs_to_user($user, false)): ?>
			<div class="pushups">

				<form action="#" id="quest_access" class="btn-group marg-bottom full-width public-private-radios" data-toggle="buttons">
				
					<label id="set_access_public" class="btn btn-primary <?= $quest->is_public() ? 'active' : null ?>" style="width:50%">
						<input name="access" type="radio" value="public" data-access-type="public" class="" ><i class="icon-unlock icon-large"></i>&nbsp;&nbsp;&nbsp;Public</input>
					</label>
					<label id="set_access_private" class="btn btn-primary <?= $quest->is_private() ? 'active' : null ?>" style="width:50%">
						<input name="access" type="radio" value="private" data-access-type="private" class="" ><i class="icon-lock icon-large"></i>&nbsp;&nbsp;&nbsp;Private</input>
					</label>
					
				</form>

				<button id="fb_share" class="marg-bottom push-center btn btn-fb btn-block push-center quest-invite"
					data-picture="<?= $quest->default_thumb_url() ?>"
					data-link="<?= $quest->full_url() ?>"
					data-name="Help me find a <?= $quest->name ?>"
					data-caption="ShopGab - Shop Socially!"
					data-description="<?= $user->display_name() ?> is trying to find a <?= $quest->name ?> through ShopGab and has requested your input! Please click on the link below to see their page and join in the search. Thanks!"><i class="icon-facebook icon-large"></i>&nbsp;&nbsp;&nbsp;Post to timeline</button>
				
				<?php if (Fuel::$env == 'production'): ?>
				<button id="fb_invite" class="btn btn-primary btn-fb btn-block push-center quest-message" href="" data-link="<?= $quest->full_url() ?>"><i class="icon-facebook icon-large"></i>&nbsp;&nbsp;&nbsp;Message friends</button>
				<?php else: ?>
				<button id="fb_invite" class="btn btn-primary btn-fb btn-block push-center quest-message" href="" data-link="http://test.shopgab.com/<?= Uri::string(); ?>"><i class="icon-facebook icon-large"></i>&nbsp;&nbsp;&nbsp;Message friends</button>
				<?php endif; ?>
			</div>
			<?php endif; ?>
		</div>
	</div>

	<div class="row">
		<div class="col-12 col-sm-8">
			<div class="box marg-top no-border">
				<?= View::forge('quests/products', array('quest' => $quest, 'quest_products' => $quest_products)) ?>
			</div>
		</div>

		<div class="col-12 col-sm-4">
			<div class="box marg-top participants">
				<?= View::forge('quests/participants', array('quest' => $quest)) ?>
			</div>

			<div class="box marg-top">
				<?= View::forge('quests/messages', array('quest' => $quest, 'messages' => $quest_messages)) ?>
			</div>
		</div>
	</div>

