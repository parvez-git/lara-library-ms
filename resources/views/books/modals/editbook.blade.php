
<div class="modal fade" id="bookeditmodal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Book</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="{{route('books.store')}}" method="post">
      <div class="modal-body">
        <div class="container">
          {{ csrf_field() }}
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
                      <select class="form-control" name="series" id="series">
                        <option selected>Choose...</option>
                        <option>Harry porter series</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                  </div>
              </div>

              <div class="form-group row">
                  <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
                  <div class="col-sm-10">
                      <select class="form-control" name="publisher" id="publisher">
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                  </div>
              </div>

              <div class="form-group row">
                  <label for="author" class="col-sm-2 col-form-label">Author</label>
                  <div class="col-sm-10">
                      <select class="form-control" name="author" id="author">
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                  </div>
              </div>

              <div class="form-group row">
                  <label for="genre" class="col-sm-2 col-form-label">Genre</label>
                  <div class="col-sm-10">
                      <select class="form-control" name="genre" id="genre">
                        <option selected disabled>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                  </div>
              </div>

              <div class="form-group row">
                  <label for="edition" class="col-sm-2 col-form-label">Edition</label>
                  <div class="col-sm-10">
                      <select class="form-control" name="edition" id="edition">
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
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
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
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
                      <select class="form-control" name="language" id="language">
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
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
                <img src="" alt="" width="100%" height="300px" id="bookimageeditpreview" style="border:1px solid #ccc">
                <input type="file" name="image" class="form-control-file mt-3" id="bookimageedit">
              </div>
            </div> <!-- /.col-md-3 -->

          </div>  <!-- /.row -->

        </div> <!-- /.container -->
      </div> <!-- /.modal-body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Edit Book</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>
