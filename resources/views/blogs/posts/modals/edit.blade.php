<div class="modal fade" id="posteditmodal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-md-8">

                <div class="form-group row">
                    <label for="edittitle" class="col-sm-2 col-form-label">Title: </label>
                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" id="edittitle">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="editpostcontent" class="col-sm-2 col-form-label">Content: </label>
                    <div class="col-sm-10">
                        <textarea name="content" class="form-control" id="editpostcontent"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="editshortcontent" class="col-sm-2 col-form-label">Short Content: </label>
                    <div class="col-sm-10">
                        <textarea name="short_content" class="form-control" id="editshortcontent"></textarea>
                    </div>
                </div>

                <hr>

                <div class="form-group row">
                    <label for="editmetatitle" class="col-sm-2 col-form-label">Meta Title: </label>
                    <div class="col-sm-10">
                        <input type="text" name="meta_title" class="form-control" id="editmetatitle">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="editmetakeywords" class="col-sm-2 col-form-label">Meta Keywords: </label>
                    <div class="col-sm-10">
                        <input type="text" name="meta_keywords" class="form-control" id="editmetakeywords">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="editmetadescription" class="col-sm-2 col-form-label">Meta Description: </label>
                    <div class="col-sm-10">
                        <textarea name="meta_description" class="form-control" id="editmetadescription"></textarea>
                    </div>
                </div>

            </div> <!-- /.col-md-8 -->

            <div class="col-md-4">

                <div class="form-group">
                    <select class="form-control select2-single" name="status" id="editstatus">
                        @if (Auth::user()->role_id != 3)
                        <option value="1">Publish</option>
                        @endif
                        <option value="0">Pending</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="editpublishedon">Published On: </label>
                    <input type="text" name="published_on" class="form-control datepicker" id="editpublishedon">
                </div>

                <div class="form-group">
                    <label for="editcategory">Category: </label>
                    <select class="form-control select2-multiple" name="category[]" id="editcategory" multiple="multiple">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <img src="" alt="" width="100%" height="160px" id="postimageeditpreview" class="border rounded d-block">
                    <input type="file" name="image" class="form-control-file mt-3" id="postimageedit">
                </div>

            </div> <!-- /.col-md-4 -->

          </div>  <!-- /.row -->

        </div> <!-- /.container -->
      </div> <!-- /.modal-body -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div> <!-- /.modal-footer -->
    </form>
    </div>
  </div>
</div>
