	<div class="row">
		<div class="col-12">
			<h2>Quests:</h2>
		</div>
		<div class="col-12">
		<div class="row">
			<div class="col-12 col-sm-8">
				<div class="row">
					<div class="col-12 col-sm-8 pad-top">
						<select class="dash-search-select form-control">
							<option disabled selected>Sort By Recent Updates</option>
						</select>
					</div>
					<div class="col-12 col-sm-4 pad-top">
						<button href="#questModal" class="btn btn-success pull-right <?= $user->has_seen_notice('start_quest') ? : 'tour-quest-btn' ?>" data-container="body" data-placement="top" data-content="Get started looking for your first product." data-original-title="" title="" data-toggle="modal">Start a new Quest!</button>
					</div>
				</div>
				<div class="row pad-top">
					<div class="col-12"
						<div class="row product-rows">
							<?php foreach ($quests as $quest): ?>
								<div class="col-12 col-sm-4 col-lg-3 dash-product-square">
                  <div class="added-by <?php if($quest->created_by){ ?>dark-grey<?php } ?>">
                    <?php if ($quest->created_by) { ?>
                      <i class="icon-user"></i> Added by <?= Model_User::get_by_id($quest->created_by)->display_name() ?>
                    <?php } else { ?>
                      &nbsp;
                    <?php } ?>
                  </div>
									<a href="<?= Uri::create($quest->url()) ?>" class="dash-product-image-div" style="background-image:url(<?= $quest->default_thumb_url(250, 220) ?>)">
										<div class="product-name"><?= $quest->name() ?></div>
										<span class="close dash-close"><span class="badge"><?= $quest->total_unseen_notifications() ?></span>
									</a>
								</div>
							<?php endforeach; ?>
							<div class="col-12 col-sm-4 col-lg-3 dash-product-square no">
								<div class="added-by">
									&nbsp;
								</div>
								<a style="border: 2px dashed #aaa; background-image:url(/assets/img/add-quest.png)" href="#questModal" class="dash-product-image-div" data-toggle="modal">
								</a>
							</div>
					</div>
			</div>
		</div>
    <?php if ($user->group == Model_User::PROFESSIONAL_GROUP_ID) { ?>
      <div class="col-12 col-sm-4 pad-top">
        <div class="box my_clients">
          <h4>Clients <a class="btn btn-success pull-right" href="/">Refresh</a></h4>
          <div class="content">
            <?php foreach ($user->getProfessionalModel()->getClients() as $client) { ?>
              <ul class="list-group">
                <li class="list-group-item">
                  <a href="/client/<?=$client->id ?>"><img class="force-32-32" src="<?= $client->getUser()->get_avatar_uri() ?>" /> <?= $client->getUser()->display_name() ?></a> -
                  <a href="/client/<?=$client->id ?>/remove" class="remove_client_link">Remove</a>
                </li>
              </ul>
            <?php } ?>
          </div>
        </div>
      </div>
      <script type="text/javascript">
        $('a.remove_client_link').click(function(e) {
          return confirm('Remove this client from your network?');
        });
      </script>
    <?php } ?>
		</div>
	</div>
</div>
