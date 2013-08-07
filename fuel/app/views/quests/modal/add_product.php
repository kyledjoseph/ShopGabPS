	<div id="addProductModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h3 id="addProductModalLabel">Add Product</h3>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-6 add-product-drag">
					<h4 class="drag-to">Drag this to your bookmarks!</h4>
					<a class="grab bookmarklet" href="javascript:(function(){var e=document.createElement('script');e.id='itemnation-script';e.src='http://shopgab.com/bookmark.js?cacheblock=' + Math.floor(Math.random() * 999999999);document.getElementsByTagName('head')[0].appendChild(e)})();"><img class="grab" src="<?= Uri::create('assets/img/bookmark.png') ?>" alt="Add to ShopGab" /></a>
					<iframe class="add-product-video" width="100%" src="http://www.youtube.com/embed/qDf4w9spx5U?showinfo=0" frameborder="0" allowfullscreen></iframe>
				</div>
				<div class="col-6 add-product-form">
					<h4>Capture from the web!</h4>
					<?= Form::open() ?>
						<div class="control-group">
							<div class="controls">
								<input type="text" id="open_url_location" class="form-control" placeholder="Enter a URL">
							</div>
						</div>
						<button id="open_url" class="btn btn-primary" data-dismiss="modal">Go</button>
					</form>
					<?= Form::open(array('action' => 'http://google.com/search', 'method' => 'get', 'target' => '_blank')) ?>
						<div class="control-group">
							<div class="controls">
								<input type="text" id="google" name="q" class="form-control" placeholder="Search with Google">
							</div>
						</div>
						<button type="submit" class="btn btn-primary">Search Google</button>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default del-add-product-video" data-dismiss="modal" aria-hidden="true">Close</button>
			</div>
		</div>
	</div>
</div>