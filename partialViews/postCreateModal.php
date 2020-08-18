<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

        <div class="row mt-4">
        <input class="form-control col-md-8 mb-4 offset-md-2" id="postTitle" type="text" placeholder="Title">
          <div id="editor">
              <div id='edit'>
                
              </div>
            </div>
          </div>
          <div class="row mt-3 mb-4">
            <button id="btnPostCreate" style="margin:auto;" class="btn btn-success">Paylaş</button>
          </div>
    </div>
  </div>
</div>


    
<script type="text/javascript" src="node_modules/froala-editor/js/froala_editor.pkgd.min.js"></script>

  <script>
    (function () {
      new FroalaEditor("#edit")
    })()
  </script>
 