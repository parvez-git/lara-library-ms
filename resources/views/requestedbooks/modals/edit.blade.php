<div class="modal fade" id="requestedbookeditmodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Requested Book</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="" method="post">
        @csrf
        @method('PUT')
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
                <label for="bookid">Books</label>
                <select name="book_id" class="form-control select2-single" id="bookid">
                  <option selected disabled>-- SELECT BOOK --</option>
                    @foreach($books as $book)
                      @if($book->quantity > $book->issuedbooks_count)
                        <option value="{{$book->id}}">
                          {{$book->title}} by {{$book->author->name}}
                          ( {{$book->published_year}} )
                        </option>
                    @endif
                  @endforeach
                </select>
              </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
                <label for="userid">Members</label>
                <select name="user_id" class="form-control select2-single" id="userid">
                  <option selected disabled>-- SELECT MEMBER --</option>
                  @foreach($users as $user)
                    <option value="{{$user->id}}">
                      {{$user->name}}
                      ( {{$user->email}} )
                    </option>
                  @endforeach
                </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group"><label for="editstatus">Status</label>
              <select name="status" class="form-control" id="editstatus">
                <option value="pending">Pending</option>
                <option value="accepted">Accepted</option>
                <option value="rejected">Rejected</option>
              </select>
            </div>
          </div>
        </div>

      </div> <!-- /.modal-body -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update Requested Book</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div> <!-- /.modal-footer -->
    </form>
    </div>
  </div>
</div>
