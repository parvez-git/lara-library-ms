
<div class="modal fade" id="genreeditmodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit genre</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<<<<<<< HEAD
      <form class="" action="" method="post">
        @csrf
        @method('PUT')
      <div class="modal-body">
=======
      <form class="" action="{{route('genres.store')}}" method="post">
      <div class="modal-body">
        {{ csrf_field() }}

>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="name">
            </div>
        </div>
<<<<<<< HEAD
      </div> <!-- /.modal-body -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Edit genre</button>
=======

      </div> <!-- /.modal-body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Edit genre</button>
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>
