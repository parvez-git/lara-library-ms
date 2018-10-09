<div class="modal fade" id="authoreditmodal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Author</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      <div class="modal-body">
        <div class="container">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-md-9">

              <div class="form-group row">
                  <label for="name" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                      <input type="text" name="name" class="form-control" id="name">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="country" class="col-sm-2 col-form-label">Country</label>
                  <div class="col-sm-10">
                      <select class="form-control select2-single" name="country_id" id="country">
                        @foreach($countries as $country)
                        <option value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
                      </select>
                  </div>
              </div>

              <div class="form-group row">
                  <label for="language" class="col-sm-2 col-form-label">Language</label>
                  <div class="col-sm-10">
                    <select class="form-control select2-single" name="language_id" id="language">
                      @foreach($languages as $language)
                      <option value="{{$language->id}}">{{$language->name}}</option>
                      @endforeach
                    </select>
                  </div>
              </div>

              <div class="form-group row">
                  <label for="dateofbirth" class="col-sm-2 col-form-label">Date of Birth</label>
                  <div class="col-sm-10">
                      <input type="text" name="dateofbirth" class="form-control datepicker" id="dateofbirth">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="bio" class="col-sm-2 col-form-label">Biography</label>
                  <div class="col-sm-10">
                      <textarea name="bio" class="form-control" id="editauthorbio"></textarea>
                  </div>
              </div>

            </div> <!-- /.col-md-9 -->

            <div class="col-md-3">
              <div class="form-group row">
                <img src="" alt="" width="100%" height="200px" id="authorimageeditpreview" style="border:1px solid #ccc">
                <input type="file" name="image" class="form-control-file mt-3" id="authorimageedit">
              </div>
            </div> <!-- /.col-md-3 -->

          </div>  <!-- /.row -->

        </div> <!-- /.container -->
      </div> <!-- /.modal-body -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>
