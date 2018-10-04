<div class="modal fade" id="createpostmodal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-md-8">

                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Title: </label>
                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" id="title">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="createpostcontent" class="col-sm-2 col-form-label">Content: </label>
                    <div class="col-sm-10">
                        <textarea name="content" class="form-control" id="createpostcontent"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="shortcontent" class="col-sm-2 col-form-label">Short Content: </label>
                    <div class="col-sm-10">
                        <textarea name="short_content" class="form-control" id="shortcontent"></textarea>
                    </div>
                </div>

                <hr>

                <div class="form-group row">
                    <label for="metatitle" class="col-sm-2 col-form-label">Meta Title: </label>
                    <div class="col-sm-10">
                        <input type="text" name="meta_title" class="form-control" id="metatitle">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="metakeywords" class="col-sm-2 col-form-label">Meta Keywords: </label>
                    <div class="col-sm-10">
                        <input type="text" name="meta_keywords" class="form-control" id="metakeywords">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="meta_description" class="col-sm-2 col-form-label">Meta Description: </label>
                    <div class="col-sm-10">
                        <textarea name="meta_description" class="form-control" id="metadescription"></textarea>
                    </div>
                </div>

            </div> <!-- /.col-md-8 -->

            <div class="col-md-4">

                <div class="form-group">
                    <select class="form-control select2-single" name="status">
                        <option value="1">Publish</option>
                        <option value="0">Pending</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="publishedon">Published On: </label>
                    <input type="text" name="published_on" class="form-control datepicker" id="publishedon">
                </div>

                <div class="form-group">
                    <label for="category">Category: </label>
                    <select class="form-control select2-multiple" name="category[]" id="category" multiple="multiple">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <img src="" alt="" width="100%" height="160px" id="postimagecreatepreview" class="border rounded d-block">
                    <input type="file" name="image" class="form-control-file mt-3" id="postimagecreate">
                </div>

            </div> <!-- /.col-md-4 -->

          </div>  <!-- /.row -->

        </div> <!-- /.container -->
      </div> <!-- /.modal-body -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Create post</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div> <!-- /.modal-footer -->
    </form>
    </div>
  </div>
</div>
