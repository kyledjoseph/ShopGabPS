	<div class="row">
		<div class="">
            <?php if ($user->group == Model_User::PROFESSIONAL_GROUP_ID) { ?>
			    <h2>Clients Quests</h2>
            <?php } else { ?>
                <h2>My Quests</h2>
            <?php } // if ?>
		</div>
		<div class="col-12">
		<div class="row">
			<div class="col-12 col-sm-8">

<!-- 				<div class="row">
					<div class="col-12 col-sm-8 pad-top">
						<select class="dash-search-select form-control">
							<option disabled selected>Sort By Recent Updates</option>
						</select>
					</div>
					<div class="col-12 col-sm-4 pad-top">
						// Button 
					</div>
				</div> -->

				<div class="row pad-top">
				  <div class='mw-title'>
				    <div class="col-sm-8 pad-top pull-left mw-title-text">
				      <h2>All Quests</h2>
				    </div>
				    <div class="col-sm-4 pad-top pull-right mw-title-button">
				      <button href="#questModal" class="btn btn-success pull-right <?= $user->has_seen_notice('start_quest') ? : 'tour-quest-btn' ?>" data-container="body" data-placement="top" data-content="Get started looking for your first product." data-original-title="" title="" data-toggle="modal">Start a new Quest!</button>
				    </div>
				  </div>				  
				</div>
				<div class="row pad-top">
					<div class="col-12">
						<div class="row product-rows">
							<?php foreach ($quests as $quest): ?>
								<div class="col-12 col-sm-4 col-lg-3 quest-square dash-product-square">

								  <a href="<?= Uri::create($quest->url()) ?>" class="quest-link" >    

									<!--if logged user is professional show who does this quest belongs to-->
                    <?php if ($user->group == Model_User::PROFESSIONAL_GROUP_ID) { ?>
                      <div class="quest-owner">
                        <?php echo $quest->user->display_name() ?>
                      </div>
                    <?php } // if ?>

								  	<div class='dash-product-image-div-wrap'>
							  	     <div class='dash-product-image-div' style="background-image:url(<?= $quest->default_thumb_url(250, 220) ?>)">

							  	       <div class='quest-shadow'>
							  	         
							  	       </div>
							  	       <div class='quest-zoom'>
							  	         
							  	       </div>
							  	       <span class="close dash-close"><span class="badge"><?= $quest->total_unseen_notifications() ?></span>
							  	     </div>          	
								  	</div>

								    <div class='dash-quest-stack'>                      
								    </div>
								    <div class='dash-quest-stack-2'>                      
								    </div>
								    <div class="product-name"><?= $quest->name() ?></div>

								  </a>
								</div>
							<?php endforeach; ?>
							<div class="col-12 col-sm-4 col-lg-3 dash-product-square no">
							  <div class='dash-product-new-wrap'>
							    <div class="added-by">
							      &nbsp;
							    </div>
							    <a style="border: 2px dashed #aaa;" href="#questModal" class="dash-product-image-div" data-toggle="modal">Start a new Quest!</a>
							  </div>
							</div>
					</div>
			</div>
		</div>
	</div>
    <?php if ($user->group == Model_User::PROFESSIONAL_GROUP_ID) { ?>
      <div class="col-12 col-sm-4 pad-top right-sidebar">
        <div class="box my_clients">
        	<div class='mw-title'>
        	  <div class="col-sm-8 pad-top pull-left mw-title-text">
        	    <h2>Clients</h2>
        	  </div>
        	  <div class="col-sm-4 pad-top pull-right mw-title-button">
        	    <a class="btn btn-success pull-right" href="/">Refresh</a>
        	  </div>
        	</div>	
          <div class="content">
            <?php foreach ($user->getProfessionalModel()->getClients() as $client) { ?>
              <ul class="list-group client-list">
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
