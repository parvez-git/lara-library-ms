
<div class="modal fade" id="bookeditmodal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Book</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<<<<<<< HEAD
      <form action="" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      <div class="modal-body">
        <div class="container">
=======
      <form class="" action="{{route('books.store')}}" method="post">
      <div class="modal-body">
        <div class="container">
          {{ csrf_field() }}
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
          <div class="row">
            <div class="col-md-9">

              <div class="form-group row">
                  <label for="title" class="col-sm-2 col-form-label">Title</label>
                  <div class="col-sm-10">
                      <input type="text" name="title" class="form-control" id="title">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="subtitle" class="col-sm-2 col-form-label">Subtitle</label>
                  <div class="col-sm-10">
                      <input type="text" name="subtitle" class="form-control" id="subtitle">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="ISBN" class="col-sm-2 col-form-label">ISBN</label>
                  <div class="col-sm-10">
                      <input type="number" name="ISBN" class="form-control" id="ISBN">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="series" class="col-sm-2 col-form-label">Series</label>
                  <div class="col-sm-10">
<<<<<<< HEAD
                      <select class="form-control select2-single" name="series_id" id="series">
                        @foreach($allseries as $series)
                        <option value="{{$series->id}}">{{$series->name}}</option>
=======
                      <select class="form-control" name="series" id="series">
                        <option selected disabled>-Select Series-</option>
                        @foreach($allseries as $series)
                        <option>{{$series->name}}</option>
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
                        @endforeach
                      </select>
                  </div>
              </div>

              <div class="form-group row">
                  <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
                  <div class="col-sm-10">
<<<<<<< HEAD
                      <select class="form-control select2-single" name="publisher_id" id="publisher">
                        @foreach($publishers as $publisher)
                        <option value="{{$publisher->id}}">{{$publisher->name}}</option>
=======
                      <select class="form-control" name="publisher" id="publisher">
                        <option selected disabled>-Select Publisher-</option>
                        @foreach($publishers as $publisher)
                        <option>{{$publisher->name}}</option>
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
                        @endforeach
                      </select>
                  </div>
              </div>

              <div class="form-group row">
                  <label for="author" class="col-sm-2 col-form-label">Author</label>
                  <div class="col-sm-10">
<<<<<<< HEAD
                      <select class="form-control select2-single" name="author_id" id="author">
=======
                      <select class="form-control" name="author_id" id="author">
                        <option selected disabled>-Select Author-</option>
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
                        @foreach($authors as $author)
                        <option value="{{$author->id}}">{{$author->name}}</option>
                        @endforeach
                      </select>
                  </div>
              </div>

              <div class="form-group row">
                  <label for="genre" class="col-sm-2 col-form-label">Genre</label>
                  <div class="col-sm-10">
<<<<<<< HEAD
                      <select class="form-control select2-multiple" name="genre[]" id="genre" multiple="multiple">
                        @foreach($genres as $genre)
                        <option value="{{$genre->id}}">{{$genre->name}}</option>
=======
                      <select class="form-control" name="genre" id="genre">
                        <option selected disabled>-Select Genre-</option>
                        @foreach($genres as $genre)
                        <option>{{$genre->name}}</option>
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
                        @endforeach
                      </select>
                  </div>
              </div>

              <div class="form-group row">
                  <label for="edition" class="col-sm-2 col-form-label">Edition</label>
                  <div class="col-sm-10">
                      <input type="text" name="edition" class="form-control" id="edition">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="published_year" class="col-sm-2 col-form-label">Year</label>
                  <div class="col-sm-10">
                      <input type="number" name="published_year" class="form-control" id="published_year">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="pages" class="col-sm-2 col-form-label">Pages</label>
                  <div class="col-sm-10">
                      <input type="number" name="pages" class="form-control" id="pages">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="binding" class="col-sm-2 col-form-label">Binding</label>
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
                  <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                  <div class="col-sm-10">
                      <input type="number" name="quantity" class="form-control" id="quantity">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="price" class="col-sm-2 col-form-label">Price</label>
                  <div class="col-sm-10">
                      <input type="number" name="price" class="form-control" id="price">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="language" class="col-sm-2 col-form-label">Language</label>
                  <div class="col-sm-10">
<<<<<<< HEAD
                    <select class="form-control select2-single" name="language_id" id="language">
                        @foreach($languages as $language)
                        <option value="{{$language->id}}">{{$language->name}}</option>
=======
                    <select class="form-control" name="language" id="language">
                        <option selected disabled>-Select Language-</option>
                        @foreach($languages as $language)
                        <option>{{$language->name}}</option>
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
                        @endforeach
                      </select>
                  </div>
              </div>

              <div class="form-group row">
                  <label for="description" class="col-sm-2 col-form-label">Description</label>
                  <div class="col-sm-10">
                      <textarea name="description" class="form-control" id="description"></textarea>
                  </div>
              </div>

            </div> <!-- /.col-md-9 -->

            <div class="col-md-3">
              <div class="form-group row">
<<<<<<< HEAD
                <img src="" alt="" width="100%" id="bookimageeditpreview" style="border:1px solid #ccc;min-height:100px;">
=======
                <img src="" alt="" width="100%" height="300px" id="bookimageeditpreview" style="border:1px solid #ccc">
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
                <input type="file" name="image" class="form-control-file mt-3" id="bookimageedit">
              </div>
            </div> <!-- /.col-md-3 -->

          </div>  <!-- /.row -->

        </div> <!-- /.container -->
      </div> <!-- /.modal-body -->
      <div class="modal-footer">
<<<<<<< HEAD
        <button type="submit" class="btn btn-primary">Edit Book</button>
=======
        <button type="button" class="btn btn-primary">Edit Book</button>
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>
