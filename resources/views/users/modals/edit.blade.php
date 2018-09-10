
<div class="modal fade" id="editusermodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="" method="post">
        @csrf
        @method('PUT')
      <div class="modal-body">

        <div class="form-group row">
            <label for="editname" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="editname">
            </div>
        </div>
        <div class="form-group row">
            <label for="editemail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" name="email" class="form-control" id="editemail">
            </div>
        </div>

        <div class="form-group row">
            <label for="editrole" class="col-sm-2 col-form-label">Role</label>
            <div class="col-sm-10">
              <select name="role_id" class="form-control" id="editrole">
                <option value="3">Member</option>
                <option value="2">Librarian</option>
                <option value="1">Admin</option>
              </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="editstatus" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
              <select name="status" class="form-control" id="editstatus">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
              </select>
            </div>
        </div>

      </div> <!-- /.modal-body -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Edit User</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div> <!-- /.modal-footer -->
    </form>
    </div>
  </div>
</div>
