<div class="modal fade" id="issuebookmodal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Issue Book</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="{{route('issuedbooks.store')}}" method="post">
        @csrf
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
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
          <div class="col-md-6">
            <div class="form-group">
                <label for="user_id">Members</label>
                <select name="user_id" class="form-control select2-single" id="user_id">
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
          @php
            $today        = date("Y-m-d");
            $expiry_date  = Date('Y-m-d', strtotime("+3 days"));
            $nameOfDay    = date('D', strtotime($expiry_date));
          @endphp
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Issued Date</label>
              <input type="text" name="issued_date" class="form-control datepicker" value="{{ $today }}">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Expiry Date <span class="text-dark">( {{$nameOfDay}} )</span></label>
              <input type="text" name="expiry_date" class="form-control datepicker" value="{{ $expiry_date }}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Penalty Money</label>
              <input type="number" name="penalty_money" class="form-control" value="0">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control" id="status">
                  <option value="borrowed">Borrowed</option>
                  <option value="returned">Returned</option>
                  <option value="late">Late</option>
                  <option value="lost">Lost</option>
                </select>
              </div>
          </div>
        </div>

        <div class="row" id="issued-books-member"></div>

      </div> <!-- /.modal-body -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Issue Book</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div> <!-- /.modal-footer -->
    </form>
    </div>
  </div>
</div>
