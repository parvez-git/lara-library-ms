<div class="modal fade" id="requestedbookmodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Request Book</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="{{route('requestedbooks.store')}}" method="post">
        @csrf
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
                <label for="book_id">Books</label>
                <select name="book_id" class="form-control select2-single" id="book_id">
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

        @if(auth()->user()->role_id == 2)
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
                <label for="user_id">Members</label>
                <select name="user_id" class="form-control select2-single" id="user_id">
                  <option selected disabled>-- SELECT MEMBER --</option>
                  @foreach($users as $user)
                    <option value="{{$user->id}}">
                      {{$user->name}} ( {{$user->email}} )
                    </option>
                  @endforeach
                </select>
            </div>
          </div>
        </div>
        @endif

      </div> <!-- /.modal-body -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Request Book</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div> <!-- /.modal-footer -->
    </form>
    </div>
  </div>
</div>
