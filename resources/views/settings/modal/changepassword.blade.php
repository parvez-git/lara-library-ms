
<div class="modal fade" id="changepasswordmodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="{{route('profile.changepassword')}}" method="post">
          @csrf

          <div class="modal-body">

            <div class="form-group row">
                <label for="currentpassword" class="col-sm-4 col-form-label">Current Password</label>
                <div class="col-sm-8">
                    <input type="password" name="currentpassword" class="form-control" id="currentpassword" placeholder="Current Password">
                </div>
            </div>
            <div class="form-group row">
                <label for="newpassword" class="col-sm-4 col-form-label">New Password</label>
                <div class="col-sm-8">
                    <input type="password" name="newpassword" class="form-control" id="newpassword" placeholder="New Password">
                </div>
            </div>
            <div class="form-group row">
                <label for="confirmation" class="col-sm-4 col-form-label">Confirm Password</label>
                <div class="col-sm-8">
                    <input type="password" name="newpassword_confirmation" class="form-control" id="confirmation" placeholder="Confirm Password">
                </div>
            </div>


          </div> <!-- /.modal-body -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Change Password</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div> <!-- /.modal-footer -->
      </form>
    </div>
  </div>
</div>
