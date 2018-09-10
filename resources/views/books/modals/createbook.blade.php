
<div class="modal fade" id="createbookmodal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Book</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="{{route('books.store')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-md-9">

              <div class="form-group row">
                  <label for="title" class="col-sm-2 col-form-label">Title<span class="red">*</span></label>
                  <div class="col-sm-10">
                      <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="subtitle" class="col-sm-2 col-form-label">Subtitle</label>
                  <div class="col-sm-10">
                      <input type="text" name="subtitle" class="form-control" id="subtitle" placeholder="Subtitle">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="ISBN" class="col-sm-2 col-form-label">ISBN<span class="red">*</span></label>
                  <div class="col-sm-10">
                      <input type="number" name="ISBN" class="form-control" id="ISBN" placeholder="ISBN">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="series_id" class="col-sm-2 col-form-label">Series</label>
                  <div class="col-sm-10">
                      <select class="form-control select2-single" name="series_id" id="series_id">
                        <option selected disabled>-Select Series-</option>
                        @foreach($allseries as $series)
                        <option value="{{$series->id}}">{{$series->name}}</option>
                        @endforeach
                      </select>
                  </div>
              </div>

              <div class="form-group row">
                  <label for="publisher_id" class="col-sm-2 col-form-label">Publisher<span class="red">*</span></label>
                  <div class="col-sm-10">
                      <select class="form-control select2-single" name="publisher_id" id="publisher_id">
                        <option selected disabled>-Select Publisher-</option>
                        @foreach($publishers as $publisher)
                        <option value="{{$publisher->id}}">{{$publisher->name}}</option>
                        @endforeach
                      </select>
                  </div>
              </div>

              <div class="form-group row">
                  <label for="author_id" class="col-sm-2 col-form-label">Author<span class="red">*</span></label>
                  <div class="col-sm-10">
                      <select class="form-control select2-single" name="author_id" id="author_id">
                        <option selected disabled>-Select Author-</option>
                        @foreach($authors as $author)
                        <option value="{{$author->id}}">{{$author->name}}</option>
                        @endforeach
                      </select>
                  </div>
              </div>

              <div class="form-group row">
                  <label for="genre_id" class="col-sm-2 col-form-label">Genre<span class="red">*</span></label>
                  <div class="col-sm-10">
                      <select class="form-control select2-multiple" name="genre[]" id="genre_id" multiple="multiple">
                        @foreach($genres as $genre)
                          <option value="{{$genre->id}}">{{$genre->name}}</option>
                        @endforeach
                      </select>
                  </div>
              </div>

              <div class="form-group row">
                  <label for="edition" class="col-sm-2 col-form-label">Edition</label>
                  <div class="col-sm-10">
                      <input type="text" name="edition" class="form-control" id="edition" placeholder="Edition">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="published_year" class="col-sm-2 col-form-label">Year<span class="red">*</span></label>
                  <div class="col-sm-10">
                      <input type="number" name="published_year" class="form-control" id="published_year" placeholder="Published Year">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="pages" class="col-sm-2 col-form-label">Pages<span class="red">*</span></label>
                  <div class="col-sm-10">
                      <input type="number" name="pages" class="form-control" id="pages" placeholder="Pages">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="binding" class="col-sm-2 col-form-label">Binding<span class="red">*</span></label>
                  <div class="col-sm-10">
                      <select class="form-control" name="binding" id="binding">
                        <option selected disabled>-Select Binding-</option>
                        <option>Softcover</option>
                        <option>Hardcover</option>
                        <option>Paperback</option>
                      </select>
                  </div>
              </div>

              <div class="form-group row">
                  <label for="quantity" class="col-sm-2 col-form-label">Quantity<span class="red">*</span></label>
                  <div class="col-sm-10">
                      <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Quantity">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="price" class="col-sm-2 col-form-label">Price<span class="red">*</span></label>
                  <div class="col-sm-10">
                      <input type="number" name="price" class="form-control" id="price" placeholder="Price">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="language_id" class="col-sm-2 col-form-label">Language<span class="red">*</span></label>
                  <div class="col-sm-10">
                      <select class="form-control select2-single" name="language_id" id="language_id">
                        <option selected disabled>-Select Language-</option>
                        @foreach($languages as $language)
                        <option value="{{$language->id}}">{{$language->name}}</option>
                        @endforeach
                      </select>
                  </div>
              </div>

              <div class="form-group row">
                  <label for="description" class="col-sm-2 col-form-label">Description<span class="red">*</span></label>
                  <div class="col-sm-10">
                      <textarea name="description" class="form-control" id="description" placeholder="Description"></textarea>
                  </div>
              </div>

            </div> <!-- /.col-md-9 -->

            <div class="col-md-3">
              <div class="form-group row">
                <img src="" alt="" width="100%" id="bookimagecreatepreview" style="border:1px solid #ccc;min-height:100px">
                <input type="file" name="image" class="form-control-file mt-3" id="bookimagecreate">
              </div>
            </div> <!-- /.col-md-3 -->

          </div>  <!-- /.row -->

        </div> <!-- /.container -->
      </div> <!-- /.modal-body -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Create Book</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div> <!-- /.modal-footer -->
    </form>
    </div>
  </div>
</div>
