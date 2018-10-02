@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                  <strong>Profile</strong>
                  <button type="button" class="btn btn-sm btn-warning float-right" id="changepassword"><i class="fas fa-lock mr-1"></i>change password</button>
                </div>

                <div class="card-body">

                  <form class="" action="{{ route('profile.update') }}" method="post">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name:</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="name" value="{{ $user->name}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email:</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" class="form-control" id="email" value="{{ $user->email}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-sm-2 col-form-label">Status:</label>
                        <div class="col-sm-10">
                            <input type="hidden" name="status" id="status" value="{{ $user->status }}">
                            <div class="btn-group" role="group">
                              <button type="button" class="btn btn-success" id="active" style="box-shadow:none;">Active</button>
                              <button type="button" class="btn btn-default" id="inactive" style="box-shadow:none;">Inactive</button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-sm-2 col-form-label">Role:</label>
                        <div class="col-sm-10">
                            <span class="badge badge-warning p-2"><i class="far fa-user-circle mr-1"></i>{{ $user->role->name }}</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-sm-2 col-form-label">Account Created:</label>
                        <div class="col-sm-10">
                            <span class="badge badge-light p-2">{{ $user->created_at->diffForHumans() }}</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="perpage" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary">SAVE PROFILE</button>
                        </div>
                    </div>

                  </form>

                </div>
            </div>
        </div>
    </div>
</div>

@include('settings.modal.changepassword')

@endsection

@section('script')
    <script type="text/javascript">

        $(document).on('click', '#changepassword', function(e){
          $('#changepasswordmodal').modal('show');
        });

        $(document).on('click', '#inactive', function(){
            $(this).addClass('btn btn-danger');
            $('#active').removeClass('btn btn-success');
            $('#active').addClass('btn btn-default');
            $('#status').val(0);
        });

        $(document).on('click', '#active', function(){
            $(this).addClass('btn btn-success');
            $('#inactive').removeClass('btn btn-danger');
            $('#inactive').addClass('btn btn-default');
            $('#status').val(1);
        });

    </script>
@endsection
