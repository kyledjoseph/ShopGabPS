	<div id="addProductModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="addProductModalLabel">Add Product</h3>
		</div>
		<div>
			<div class="row">
				<div class="span6 add-product-drag">
					<h4 class="drag-to">Drag this to your bookmarks!</h4>
					<a class="grab bookmarklet" href="javascript:(function(){var e=document.createElement('script');e.id='itemnation-script';e.src='http://itemnation.com/bookmark.js?cacheblock=' + Math.floor(Math.random() * 999999999);document.getElementsByTagName('head')[0].appendChild(e)})();"><img class="grab" src="<?= Uri::create('assets/img/bookmark.png') ?>" alt="Add to ItemNation" /></a>
					<iframe width="435" height="275" src="http://www.youtube.com/embed/StC9A8xlJ9E?showinfo=0&controls=0" frameborder="0" allowfullscreen></iframe>
				</div>
				<div class="span3 add-product-form">
					<h4>Capture from the web!</h4>
					<?= Form::open() ?>
						<div class="control-group">
							<div class="controls">
								<input type="text" id="open_url_location" class="full-width" placeholder="Enter a URL">
							</div>
						</div>
						<button id="open_url" class="btn btn-primary" data-dismiss="modal">Go</button>
					</form>
					<?= Form::open(array('action' => 'http://google.com/search', 'method' => 'get', 'target' => '_blank')) ?>
						<div class="control-group">
							<div class="controls">
								<input type="text" id="google" name="q" class="full-width" placeholder="Search with Google">
							</div>
						</div>
						<button type="submit" class="btn btn-primary">Search Google</button>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			</div>
		</div>
	</div>