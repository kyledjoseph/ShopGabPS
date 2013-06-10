<div id="addProductModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="addProductModalLabel">Add Product</h3>
  </div>
  <div>
    <div class="row">
      <div class="span4 add-product-drag">
        <h4 class="drag-to">Drag this to your bookmarks!</h4>
        <a class="grab bookmarklet" href="javascript:(function(){var e=document.createElement('script');e.id='itemnation-script';e.src='http://itemnation.com/bookmark.js?cacheblock=' + Math.floor(Math.random() * 999999999);document.getElementsByTagName('head')[0].appendChild(e)})();"><img class="grab" src="img/bookmark.png" alt="Add to ItemNation" /></a>
        <iframe width="280" height="175" src="http://www.youtube.com/embed/StC9A8xlJ9E?rel=0&showinfo=0&controls=0
      " frameborder="0" allowfullscreen></iframe>
      </div>
      <div class="span3 add-product-form">
        <h4>Capture from the web!</h4>
        <form>
          <div class="control-group">
            <label class="control-label" for="inputFullName">Full Name</label>
            <div class="controls">
              <input type="text" id="inputFullName" class="full-width" placeholder="Enter a URL">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputEmail">Email</label>
            <div class="controls">
              <input type="text" id="inputEmail" class="full-width" placeholder="Search with Google">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputPassword">Password</label>
            <div class="controls">
              <input type="password" id="inputPassword" class="full-width" placeholder="Search with Bing">
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
      <button class="btn btn-primary">Go</button>
    </div>
  </div>
</div>