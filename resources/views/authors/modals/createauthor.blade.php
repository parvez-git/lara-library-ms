
<div class="modal fade" id="createauthormodal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Author</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="{{route('authors.store')}}" method="post">
      <div class="modal-body">
        <div class="container">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-md-9">

              <div class="form-group row">
                  <label for="name" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                      <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="country" class="col-sm-2 col-form-label">Country</label>
                  <div class="col-sm-10">
                      <select class="form-control" name="country" id="country">
                        <option selected disabled>-Select Country-</option>
                        @foreach($countries as $country)
                        <option>{{$country->name}}</option>
                        @endforeach
                      </select>
                  </div>
              </div>

              <div class="form-group row">
                  <label for="language" class="col-sm-2 col-form-label">Language</label>
                  <div class="col-sm-10">
                      <select class="form-control" name="language" id="language">
                        <option selected disabled>-Select Language-</option>
                        @foreach($languages as $language)
                        <option>{{$language->name}}</option>
                        @endforeach
                      </select>
                  </div>
              </div>

              <div class="form-group row">
                  <label for="dateofbirth" class="col-sm-2 col-form-label">Date of Birth</label>
                  <div class="col-sm-10">
                      <input type="text" name="dateofbirth" class="form-control" id="dateofbirth" placeholder="Date of Birth">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="bio" class="col-sm-2 col-form-label">Biography</label>
                  <div class="col-sm-10">
                      <textarea name="bio" class="form-control" id="bio" placeholder="Biography"></textarea>
                  </div>
              </div>

            </div> <!-- /.col-md-9 -->

            <div class="col-md-3">
              <div class="form-group row">
                <img src="" alt="" width="100%" height="200px" id="authorimagecreatepreview" style="border:1px solid #ccc">
                <input type="file" name="image" class="form-control-file mt-3" id="authorimagecreate">
              </div>
            </div> <!-- /.col-md-3 -->

          </div>  <!-- /.row -->

        </div> <!-- /.container -->
      </div> <!-- /.modal-body -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Create author</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div> <!-- /.modal-footer -->
    </form>
    </div>
  </div>
</div>
