	<div class="container">
		<div class="col-12 col-sm-2">
			<h4><?= $quest->user->display_name() ?></h4>
		</div>
		<div class="col-12 col-sm-10">
			<h4 class="help-me">Please help me find a <span class="product-name"><?= $quest->name() ?></span></h4>
		</div>
	</div>

	<div class="container">
		<div class="col-2">
			<?= Html::img($quest->user->get_avatar_uri(200, 200), array('width' => 100, 'height' => 100)) ?>
		</div>
		<div class="col-10 col-sm-6">
			<div class="bubble">
				<p><?= $quest->description() ?></p>
				<?php if (isset($user) and $quest->belongs_to_user($user->id)): ?>
				<?= Html::anchor('#questModal', 'Edit Quest', array('class' => '', 'data-toggle' => 'modal')) ?> |
				<?= Html::anchor('#deleteQuestModal', 'Delete Quest', array('class' => '', 'data-toggle' => 'modal')) ?> 
			<?php endif; ?>
		</div>

		<div class="purchase-within">
			Purchase within:
			<?= Form::open(array('id' => 'purchase_within_form', 'class' => 'inline-block submit-on-change', 'action' => $quest->url('within'))) ?>

			<?= Form::select('purchase_within', $quest->purchase_within_option(), Model_Quest::purchase_within_fields(), array('class' => 'form-control')) ?>
			
			<?= Form::close() ?>
			<span class="faded"><?= $quest->purchase_within !== '0' ? "({$quest->purchase_within()}) days" : '' ?></span>
		</div>
	</div>
	<div class="col-12 col-sm-4 align-center">
		<div class="btn-group pad-bottom hidden">
			<?= Html::anchor($quest->url('access/public'), 'Public', array('class' => "btn btn-default " . ($quest->is_public() ? ' active' : null))) ?>
			<?= Html::anchor($quest->url('access/private'), 'Private', array('class' => "btn btn-default " . (! $quest->is_public() ? ' active' : null))) ?>
		</div>


		<?php if (isset($user) and $quest->belongs_to_user($user->id)): ?>
		<button id="fb_share" class="marg-bottom push-center btn btn-success block push-center quest-invite"
								data-picture="<?= $quest->default_thumb_url() ?>"
								data-link="<?= $quest->full_url() ?>"
								data-name="Help me find a <?= $quest->name ?>"
								data-caption="ShopGab - Shop Socially!"
								data-description="<?= $user->display_name() ?> is trying to find a <?= $quest->name ?> through ShopGab and has requested your input! Please click on the link below to see their page and join in the search. Thanks!">Post to Facebook</button>
		<button id="fb_invite" class="btn btn-primary btn-success block push-center quest-message" href="" data-link="<?= $quest->full_url() ?>">Message friends</button>							
	<?php endif; ?>
</div>
</div>

<div class="container">
	<div class="col-12 col-sm-8">
		<div class="box marg-top">
			
			<h4>Products</h4>
			
			<?php if ($total_products > 0): ?>
			<?= Form::open(array('id' => 'sort_quest_by', 'class' => 'pull-right sort-by inline-block submit-on-change', 'method' => 'GET', 'action' => $quest->url())) ?>
			<?= Form::select('order', $quest->active_sort(), $quest->sort_options(), array('class' => 'form-control')) ?>
			<?= Form::close() ?>
			<div class="clear"></div>
		<?php endif; ?>
		
		<?php $product_i = 1; foreach ($quest_products as $quest_product): ?>
		<?php $product = $quest_product->product ?>

		<div class="product-block <?= ! $quest_product->was_added_by_owner() ? 'from-tab' : null ?>" data-product="<?= $product_i ?>">
			<div class="media">
				<div class="pull-left">
					<?= Html::img($product->image_url(), array('alt' => $product->name())) ?>
				</div>

				<div class="info media-body">
					<div class="name"><a href="<?= $product->product_url() ?>" target="_blank"><?= $product->name() ?></a></span></div>
					<span class="price"><?= $product->price() ?></span>
					<span class="description"><?= $product->description() ?></span>
					<div>
						<?php if (isset($user)): ?>
						<a href="#" class="comments"><?= $quest_product->total_comments_text() ?></a>
					<?php else: ?>
					<a href="#loginModal" data-toggle="modal"><?= $quest_product->total_comments_text() ?></a>
				<?php endif; ?>
			</div>


			<?php foreach ($quest_product->get_comments() as $comment): ?>
			<div class="comment" style="display:none">
				<span class="name"><?= $comment->user->display_name() ?></span>
				<?= $comment->comment ?>
				<div class="time"><?= $comment->time_ago() ?></div>
			</div>
		<?php endforeach; ?>


		<?= Form::open(array('action' => $quest_product->comment_url(), 'class' => 'comment', 'style' => 'display:none')) ?>
		<div class="input-group">
			<input name="comment" type="text" class="form-control" placeholder="What do you think?">
			<span class="input-group-btn">
				<button class="btn btn-default" type="submit">Comment</button>
			</span>
		</div>
	</form>
</div>

<div class="options media-body">
	<div class="score">
		<?php if (isset($user)): ?>
		<span class="badge"><?= $quest_product->total_likes() ?></span> <?= Html::anchor($quest_product->like_url(), '<i class="icon-thumbs-up-alt faded no-dec icon-large"></i>', array('title' => $quest_product->list_user_likes(), 'class' => 'user_product_vote')) ?> &nbsp; 
		<span class="badge"><?= $quest_product->total_dislikes() ?></span> <?= Html::anchor($quest_product->dislike_url(), '<i class="icon-thumbs-down-alt faded no-dec icon-large"></i>', array('title' => $quest_product->list_user_dislikes(), 'class' => 'user_product_vote')) ?>
		
	<?php else: ?>
	<span class="badge"><?= $quest_product->total_likes() ?></span> <a href="#loginModal" data-toggle="modal"><i class="icon-thumbs-up-alt faded no-dec icon-large"></i></a> &nbsp; 
	<span class="badge"><?= $quest_product->total_dislikes() ?></span> <a href="#loginModal" data-toggle="modal"><i class="icon-thumbs-down-alt faded no-dec icon-large"></i></a>
<?php endif; ?>

<?php if (isset($user) and $quest->belongs_to_user($user->id)): ?>
	<a href="<?= $quest_product->remove_url() ?>" class="btn btn-danger pull-right" data-toggle="modal">&times;</a>
<?php endif; ?>
</div>

<div class="marg-top">
	<?php if (isset($user)): ?>
	<?= Html::anchor($product->product_url(), 'Where can I buy this?', array('class' => 'btn btn-warning pull-right', 'target' => '_blank')) ?>
<?php else: ?>
	<a href="#loginModal" class="btn btn-warning" data-toggle="modal">Where can I buy this?</a>
<?php endif; ?>
</div>
</div>

<div class="product-number">
	<span><?= $product_i ?></span>
</div>

<?php if (! $quest_product->was_added_by_owner()): ?>
	<h5>Added by <?= $quest_product->user->display_name() ?></h5>
<?php endif; ?>
</div>

					<!--<div class="btn-group">
	  					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
	 					   <span class="caret"></span>
	 					 </a>
						<ul class="dropdown-menu">
	 						<li><a href="#">Add to Wishlist</a></li>
	    					<li><a href="#">Add to My Items</a></li>
	  					</ul>
	  				</div>-->
	  			</div>

	  			<?php $product_i++; endforeach; ?>

	  			<?php if (isset($user)): ?>
	  			<?php if ($quest->belongs_to_user($user->id)) { ?>
	  			<button href="#addProductModal" class="corner-button btn btn-medium btn-success quest-add-product" data-toggle="modal">+ Add Product</button>
	  			<?php } else { ?>
	  			<button href="#addProductModal" class="corner-button btn btn-medium btn-success" data-toggle="modal">+ Recommend Product</button>
	  			<?php } ?>
	  		<?php else: ?>
	  		<button href="#loginModal" class="corner-button btn btn-small btn-success" data-toggle="modal">+ Add Product</button>
	  	<?php endif; ?>

	  </div>
	</div>

	<div class="col-12 col-sm-4">
		<div class="box marg-top">
			<h4>Chat</h4>
			<div class="row">
				<div class="col-12">
					<div class="chat">
						<?php if (empty($quest_messages)): ?>
						<div class="message">No messages</div>
						
					<?php else: ?>
					<?php foreach ($quest_messages as $message): ?>

					<div class="message">
						<div class="name"><?= $message->user->display_name() ?></div>
						<div class="content">
							<?= $message->body ?>
							<div class="time"><?= $message->time_ago() ?></div>
						</div>
					</div>
					
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<?= Form::open(array('action' => $quest->url('message'))) ?>
		<div class="input-group">
			<input name="message" type="text" class="form-control">
			<span class="input-group-btn">
				<?php if (isset($user)): ?>
				<button class="btn btn-default" type="submit">Send</button>
			<?php else: ?>
			<button href="#loginModal" class="btn btn-default" data-toggle="modal">Send</button>
		<?php endif; ?>
	</span>
</div>
</form>
</div>
</div>
</div>
</div>
</div>

<script>


/* ===========================================================
# bootstrap-tour - v0.5.1
# http://bootstraptour.com
# ==============================================================
# Copyright 2012-2013 Ulrich Sossou
#
# Licensed under the Apache License, Version 2.0 (the "License");
# you may not use this file except in compliance with the License.
# You may obtain a copy of the License at
#
#     http://www.apache.org/licenses/LICENSE-2.0
#
# Unless required by applicable law or agreed to in writing, software
# distributed under the License is distributed on an "AS IS" BASIS,
# WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
# See the License for the specific language governing permissions and
# limitations under the License.
*/
(function() {
	(function($, window) {
		var Tour, document;
		document = window.document;
		Tour = (function() {
			function Tour(options) {
				this._options = $.extend({
					name: 'tour',
					container: 'body',
					keyboard: true,
					storage: window.localStorage,
					debug: false,
					backdrop: false,
					redirect: true,
					basePath: '',
					template: "<div class='popover tour'>          <div class='arrow'></div>          <h3 class='popover-title'></h3>          <div class='popover-content'></div>          <nav class='popover-navigation'>            <div class='btn-group'>              <button class='btn btn-default' data-role='prev'>&laquo; Prev</button>              <button class='btn btn-default' data-role='next'>Next &raquo;</button>            </div>            <button class='btn btn-default' data-role='end'>End tour</button>          </nav>        </div>",
					afterSetState: function(key, value) {},
					afterGetState: function(key, value) {},
					afterRemoveState: function(key) {},
					onStart: function(tour) {},
					onEnd: function(tour) {},
					onShow: function(tour) {},
					onShown: function(tour) {},
					onHide: function(tour) {},
					onHidden: function(tour) {},
					onNext: function(tour) {},
					onPrev: function(tour) {}
				}, options);
	this._steps = [];
	this.setCurrentStep();
	this.backdrop = {
		overlay: null,
		step: null,
		background: null
	};
}

Tour.prototype.setState = function(key, value) {
	var keyName;
	keyName = "" + this._options.name + "_" + key;
	this._options.storage.setItem(keyName, value);
	return this._options.afterSetState(keyName, value);
};

Tour.prototype.removeState = function(key) {
	var keyName;
	keyName = "" + this._options.name + "_" + key;
	this._options.storage.removeItem(keyName);
	return this._options.afterRemoveState(keyName);
};

Tour.prototype.getState = function(key) {
	var keyName, value;
	keyName = "" + this._options.name + "_" + key;
	value = this._options.storage.getItem(keyName);
	if (value === void 0 || value === "null") {
		value = null;
	}
	this._options.afterGetState(key, value);
	return value;
};

Tour.prototype.addSteps = function(steps) {
	var step, _i, _len, _results;
	_results = [];
	for (_i = 0, _len = steps.length; _i < _len; _i++) {
		step = steps[_i];
		_results.push(this.addStep(step));
	}
	return _results;
};

Tour.prototype.addStep = function(step) {
	return this._steps.push(step);
};

Tour.prototype.getStep = function(i) {
	if (this._steps[i] != null) {
		return $.extend({
			id: "step-" + i,
			path: "",
			placement: "right",
			title: "",
			content: "<p></p>",
			next: i === this._steps.length - 1 ? -1 : i + 1,
			prev: i - 1,
			animation: true,
			container: this._options.container,
			backdrop: this._options.backdrop,
			redirect: this._options.redirect,
			template: this._options.template,
			onShow: this._options.onShow,
			onShown: this._options.onShown,
			onHide: this._options.onHide,
			onHidden: this._options.onHidden,
			onNext: this._options.onNext,
			onPrev: this._options.onPrev
		}, this._steps[i]);
	}
};

Tour.prototype.start = function(force) {
	var promise,
	_this = this;
	if (force == null) {
		force = false;
	}
	if (this.ended() && !force) {
		return this._debug("Tour ended, start prevented.");
	}
	$(document).off("click.bootstrap-tour", ".popover *[data-role=next]").on("click.bootstrap-tour", ".popover *[data-role=next]:not(.disabled)", function(e) {
		e.preventDefault();
		return _this.next();
	});
	$(document).off("click.bootstrap-tour", ".popover *[data-role=prev]").on("click.bootstrap-tour", ".popover *[data-role=prev]:not(.disabled)", function(e) {
		e.preventDefault();
		return _this.prev();
	});
	$(document).off("click.bootstrap-tour", ".popover *[data-role=end]").on("click.bootstrap-tour", ".popover *[data-role=end]", function(e) {
		e.preventDefault();
		return _this.end();
	});
	this._onResize(function() {
		return _this.showStep(_this._current);
	});
	this._setupKeyboardNavigation();
	promise = this._makePromise(this._options.onStart != null ? this._options.onStart(this) : void 0);
	return this._callOnPromiseDone(promise, this.showStep, this._current);
};

Tour.prototype.next = function() {
	var promise;
	if (this.ended()) {
		return this._debug("Tour ended, next prevented.");
	}
	promise = this.hideStep(this._current);
	return this._callOnPromiseDone(promise, this._showNextStep);
};

Tour.prototype.prev = function() {
	var promise;
	if (this.ended()) {
		return this._debug("Tour ended, prev prevented.");
	}
	promise = this.hideStep(this._current);
	return this._callOnPromiseDone(promise, this._showPrevStep);
};

Tour.prototype.goto = function(i) {
	var promise;
	if (this.ended()) {
		return this._debug("Tour ended, goto prevented.");
	}
	promise = this.hideStep(this._current);
	return this._callOnPromiseDone(promise, this.showStep, i);
};

Tour.prototype.end = function() {
	var endHelper, hidePromise,
	_this = this;
	endHelper = function(e) {
		$(document).off("click.bootstrap-tour");
		$(document).off("keyup.bootstrap-tour");
		$(window).off("resize.bootstrap-tour");
		_this.setState("end", "yes");
		if (_this._options.onEnd != null) {
			return _this._options.onEnd(_this);
		}
	};
	hidePromise = this.hideStep(this._current);
	return this._callOnPromiseDone(hidePromise, endHelper);
};

Tour.prototype.ended = function() {
	return !!this.getState("end");
};

Tour.prototype.restart = function() {
	this.removeState("current_step");
	this.removeState("end");
	this.setCurrentStep(0);
	return this.start();
};

Tour.prototype.hideStep = function(i) {
	var hideStepHelper, promise, step,
	_this = this;
	step = this.getStep(i);
	promise = this._makePromise((step.onHide != null ? step.onHide(this, i) : void 0));
	hideStepHelper = function(e) {
		var $element;
		$element = $(step.element).popover("destroy");
		if (step.reflex) {
			$element.css("cursor", "").off("click.bootstrap-tour");
		}
		if (step.backdrop) {
			_this._hideBackdrop();
		}
		if (step.onHidden != null) {
			return step.onHidden(_this);
		}
	};
	this._callOnPromiseDone(promise, hideStepHelper);
	return promise;
};

Tour.prototype.showStep = function(i) {
	var promise, showStepHelper, step,
	_this = this;
	step = this.getStep(i);
	if (!step) {
		return;
	}
	promise = this._makePromise((step.onShow != null ? step.onShow(this, i) : void 0));
	showStepHelper = function(e) {
		var current_path, path;
		_this.setCurrentStep(i);
		path = $.isFunction(step.path) ? step.path.call() : _this._options.basePath + step.path;
		current_path = [document.location.pathname, document.location.hash].join('');
		if (_this._isRedirect(path, current_path)) {
			_this._redirect(step, path);
			return;
		}
		if (!((step.element != null) && $(step.element).length !== 0 && $(step.element).is(":visible"))) {
			_this._debug("Skip the step " + (_this._current + 1) + ". The element does not exist or is not visible.");
			_this._showNextStep();
			return;
		}
		if (step.backdrop) {
			_this._showBackdrop(step.element);
		}
		_this._showPopover(step, i);
		if (step.onShown != null) {
			step.onShown(_this);
		}
		return _this._debug("Step " + (_this._current + 1) + " of " + _this._steps.length);
	};
	return this._callOnPromiseDone(promise, showStepHelper);
};

Tour.prototype.setCurrentStep = function(value) {
	if (value != null) {
		this._current = value;
		return this.setState("current_step", value);
	} else {
		this._current = this.getState("current_step");
		if (this._current === null) {
			return this._current = 0;
		} else {
			return this._current = parseInt(this._current);
		}
	}
};

Tour.prototype._showNextStep = function() {
	var promise, showNextStepHelper, step,
	_this = this;
	step = this.getStep(this._current);
	showNextStepHelper = function(e) {
		return _this.showStep(step.next);
	};
	promise = this._makePromise((step.onNext != null ? step.onNext(this) : void 0));
	return this._callOnPromiseDone(promise, showNextStepHelper);
};

Tour.prototype._showPrevStep = function() {
	var promise, showPrevStepHelper, step,
	_this = this;
	step = this.getStep(this._current);
	showPrevStepHelper = function(e) {
		return _this.showStep(step.prev);
	};
	promise = this._makePromise((step.onPrev != null ? step.onPrev(this) : void 0));
	return this._callOnPromiseDone(promise, showPrevStepHelper);
};

Tour.prototype._debug = function(text) {
	if (this._options.debug) {
		return window.console.log("Bootstrap Tour '" + this._options.name + "' | " + text);
	}
};

Tour.prototype._isRedirect = function(path, currentPath) {
	return (path != null) && path !== "" && path.replace(/\?.*$/, "").replace(/\/?$/, "") !== currentPath.replace(/\/?$/, "");
};

Tour.prototype._redirect = function(step, path) {
	if ($.isFunction(step.redirect)) {
		return step.redirect.call(this, path);
	} else if (step.redirect === true) {
		this._debug("Redirect to " + path);
		return document.location.href = path;
	}
};

Tour.prototype._renderNavigation = function(step, i, options) {
	var navigation, template;
	template = $.isFunction(step.template) ? $(step.template(i, step)) : $(step.template);
	navigation = template.find(".popover-navigation");
	if (step.prev < 0) {
		navigation.find("*[data-role=prev]").addClass("disabled");
	}
	if (step.next < 0) {
		navigation.find("*[data-role=next]").addClass("disabled");
	}
	return template.clone().wrap("<div>").parent().html();
};

Tour.prototype._showPopover = function(step, i) {
	var $element, $tip, options, rendered,
	_this = this;
	options = $.extend({}, this._options);
	if (step.options) {
		$.extend(options, step.options);
	}
	if (step.reflex) {
		$(step.element).css("cursor", "pointer").on("click.bootstrap-tour", function(e) {
			if (_this._current < _this._steps.length - 1) {
				return _this.next();
			} else {
				return _this.end();
			}
		});
	}
	rendered = this._renderNavigation(step, i, options);
	$element = $(step.element);
	$element.popover({
		placement: step.placement,
		trigger: "manual",
		title: step.title,
		content: step.content,
		html: true,
		animation: step.animation,
		container: step.container,
		template: rendered,
		selector: step.element
	}).popover("show");
	$tip = $element.data("bs.popover") ? $element.data("bs.popover").tip() : $element.data("popover").tip();
	$tip.attr("id", step.id);
	this._scrollIntoView($element);
	this._scrollIntoView($tip);
	return this._reposition($tip, step);
};

Tour.prototype._reposition = function(tip, step) {
	var offsetBottom, offsetRight, original_left, original_offsetHeight, original_offsetWidth, original_top, tipOffset;
	original_offsetWidth = tip[0].offsetWidth;
	original_offsetHeight = tip[0].offsetHeight;
	tipOffset = tip.offset();
	original_left = tipOffset.left;
	original_top = tipOffset.top;
	offsetBottom = $(document).outerHeight() - tipOffset.top - $(tip).outerHeight();
	if (offsetBottom < 0) {
		tipOffset.top = tipOffset.top + offsetBottom;
	}
	offsetRight = $("html").outerWidth() - tipOffset.left - $(tip).outerWidth();
	if (offsetRight < 0) {
		tipOffset.left = tipOffset.left + offsetRight;
	}
	if (tipOffset.top < 0) {
		tipOffset.top = 0;
	}
	if (tipOffset.left < 0) {
		tipOffset.left = 0;
	}
	tip.offset(tipOffset);
	if (step.placement === 'bottom' || step.placement === 'top') {
		if (original_left !== tipOffset.left) {
			return this._replaceArrow(tip, (tipOffset.left - original_left) * 2, original_offsetWidth, 'left');
		}
	} else {
		if (original_top !== tipOffset.top) {
			return this._replaceArrow(tip, (tipOffset.top - original_top) * 2, original_offsetHeight, 'top');
		}
	}
};

Tour.prototype._replaceArrow = function(tip, delta, dimension, position) {
	return tip.find(".arrow").css(position, delta ? 50 * (1 - delta / dimension) + "%" : '');
};

Tour.prototype._scrollIntoView = function(tip) {
	var tipRect;
	tipRect = tip.get(0).getBoundingClientRect();
	if (!(tipRect.top >= 0 && tipRect.bottom < $(window).height() && tipRect.left >= 0 && tipRect.right < $(window).width())) {
		return tip.get(0).scrollIntoView(true);
	}
};

Tour.prototype._onResize = function(callback, timeout) {
	return $(window).on("resize.bootstrap-tour", function() {
		clearTimeout(timeout);
		return timeout = setTimeout(callback, 100);
	});
};

Tour.prototype._setupKeyboardNavigation = function() {
	var _this = this;
	if (this._options.keyboard) {
		return $(document).on("keyup.bootstrap-tour", function(e) {
			if (!e.which) {
				return;
			}
			switch (e.which) {
				case 39:
				e.preventDefault();
				if (_this._current < _this._steps.length - 1) {
					return _this.next();
				} else {
					return _this.end();
				}
				break;
				case 37:
				e.preventDefault();
				if (_this._current > 0) {
					return _this.prev();
				}
				break;
				case 27:
				e.preventDefault();
				return _this.end();
			}
		});
	}
};

Tour.prototype._makePromise = function(result) {
	if (result && $.isFunction(result.then)) {
		return result;
	} else {
		return null;
	}
};

Tour.prototype._callOnPromiseDone = function(promise, cb, arg) {
	var _this = this;
	if (promise) {
		return promise.then(function(e) {
			return cb.call(_this, arg);
		});
	} else {
		return cb.call(this, arg);
	}
};

Tour.prototype._showBackdrop = function(el) {
	if (this.backdrop.overlay !== null) {
		return;
	}
	this._showOverlay();
	return this._showOverlayElement(el);
};

Tour.prototype._hideBackdrop = function() {
	if (this.backdrop.overlay === null) {
		return;
	}
	this._hideOverlayElement();
	return this._hideOverlay();
};

Tour.prototype._showOverlay = function() {
	this.backdrop = $('<div/>');
	this.backdrop.addClass('tour-backdrop');
	this.backdrop.height($(document).innerHeight());
	return $('body').append(this.backdrop);
};

Tour.prototype._hideOverlay = function() {
	this.backdrop.remove();
	return this.backdrop.overlay = null;
};

Tour.prototype._showOverlayElement = function(el) {
	var background, offset, step;
	step = $(el);
	offset = step.offset();
	offset.top = offset.top;
	offset.left = offset.left;
	background = $('<div/>');
	background.width(step.innerWidth()).height(step.innerHeight()).addClass('tour-step-background').offset(offset);
	step.addClass('tour-step-backdrop');
	$('body').append(background);
	this.backdrop.step = step;
	return this.backdrop.background = background;
};

Tour.prototype._hideOverlayElement = function() {
	this.backdrop.step.removeClass('tour-step-backdrop');
	this.backdrop.background.remove();
	this.backdrop.step = null;
	return this.backdrop.background = null;
};

return Tour;

})();
return window.Tour = Tour;
})(jQuery, window);

}).call(this);

	var quest = new Tour();

	quest.addSteps([
	{
        element: ".quest-add-product", // string (jQuery selector) - html element next to which the step popover should be shown
        title: "Add Product", // string - title of the popover
        content: "Add your first product to your quest." // string - content of the popover
    }
    ]);

	quest.start();


	$(".chat").scrollTop($(".chat")[0].scrollHeight);</script>