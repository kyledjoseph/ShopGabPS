				<span>Purchase within:</span>
				<?= Form::open(array('id' => 'purchase_within_form', 'class' => 'inline-block submit-on-change', 'action' => $quest->url('within'))) ?>
				
				<?php if (isset($user) and $quest->belongs_to_user($user)): ?>
				<?= Form::select('purchase_within', $quest->purchase_within_option(), Model_Quest::purchase_within_fields(), array('id' => 'purchase_within_value', 'class' => 'form-control')) ?>
				<?php endif; ?>
				<?= Form::close() ?>
				<span id="purchase_within_text" class="faded"><?= $quest->purchase_within !== '0' ? $quest->purchase_within_text() : null ?></span>