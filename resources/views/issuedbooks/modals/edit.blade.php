<div class="modal fade" id="editissuedbookmodal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Issue Book</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="" method="post">
        @csrf
        @method('PUT')
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                <label for="bookid">Books</label>
                <select name="book_id" class="form-control select2-single" id="bookid">
                  @foreach($books as $book)
                    @php
                      $disabled = ($book->quantity <= $book->issuedbooks_count) ? 'disabled' : '';
                    @endphp
                      <option value="{{$book->id}}" {{ $disabled }}>
                        {{$book->title}} by {{$book->author->name}}
                        ( {{$book->published_year}} )
                      </option>
                  @endforeach
                </select>
              </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
                <label for="userid">MEMBERS</label>
                <select name="user_id" class="form-control select2-single" id="userid">
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
          <div class="col-md-6">
            <div class="form-group">
              <label for="issueddate">Issued Date</label>
              <input type="text" name="issued_date" class="form-control datepicker" id="issueddate">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="expirydate">Expiry Date</label>
              <input type="text" name="expiry_date" class="form-control datepicker" id="expirydate">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                <label for="editstatus">Status</label>
                <select name="status" class="form-control" id="editstatus">
                  <option value="borrowed">Borrowed</option>
                  <option value="returned">Returned</option>
                  <option value="late">Late</option>
                  <option value="lost">Lost</option>
                </select>
              </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="returndate">Return Date</label>
              <input type="text" name="return_date" class="form-control datepicker" id="returndate">
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label for="penaltymoney">Penalty Money</label>
              <input type="text" name="penalty_money" class="form-control" id="penaltymoney">
            </div>
          </div>
        </div>
      </div> <!-- /.modal-body -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update Issued Book</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div> <!-- /.modal-footer -->
    </form>
    </div>
  </div>
</div>
