@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                  <strong>All Users</strong>
                  <button type="button" class="btn btn-sm btn-success float-right" id="createuser"><i class="fas fa-plus-circle mr-1"></i>create user</button>
                </div>

                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>SL.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($users as $user)
                      <tr>
                        <th scope="row">{{$user->id}}.</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->name or null}}</td>
                        <td>
                          @if($user->status)
                            <span class="badge badge-success">Active</span>
                          @else
                            <span class="badge badge-danger">Inactive</span>
                          @endif
                        </td>
                        <td class="text-center">
                          <button type="button" class="btn btn-sm btn-warning" data-id="{{$user->id}}" id="useredit"><i class="fas fa-pencil-alt"></i></button>
                          <button type="button" class="btn btn-sm btn-dark" data-id="{{$user->id}}" id="changeuserpassword"><i class="fas fa-lock"></i></button>

                          @if(auth()->user()->role->slug == 'admin')
                            <button type="button" class="btn btn-sm btn-danger" data-id="{{$user->id}}" id="userdelete"><i class="fas fa-trash"></i></button>
                          @endif
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>

                <div class="card-foter m-auto">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@include('users.modals.create')
@include('users.modals.edit')
@include('users.modals.delete')
@include('users.modals.password')

@endsection


@section('script')
<script type="text/javascript">

  $(document).on('click', '#createuser', function(e){
    $('#createusermodal').modal('show');
  });


  // EDIT USER
  $(document).on('click', '#useredit', function(e){
    $('#editusermodal').modal('show');
    var id = $(this).data('id');
    $.get('users/'+id+'/edit', function(data){
      $('#editusermodal form').attr('action','users/'+data.user.id);
      $('#editusermodal #editname').val(data.user.name);
      $('#editusermodal #editemail').val(data.user.email);
      $('#editusermodal #editrole').val(data.user.role_id);
      $('#editusermodal #editrolevalue').val(data.user.role.name);
      $('#editusermodal #editstatus').val(data.user.status);
    });
  });


  // DELETE USER
  $(document).on('click', '#userdelete', function(e){
    e.preventDefault();
    var delbtntr = $(this).parents('tr');
    var id = $(this).data('id');
    $.get('users/'+id, function(data){
        $('#userdeletemodal #name').html(data.user.name);
        $('#userdeletemodal button.btn-danger').attr('id','deleteuser-'+data.user.id);
        $('#userdeletemodal').modal('show');
        $('#deleteuser-'+data.user.id).on('click', function(e){
          $.ajax({
            type: "DELETE",
            url:'users/'+data.user.id,
            data: data.user,
            success: function(data){
              delbtntr.remove();
              $('#userdeletemodal').modal('hide');
              toastr.success('User deleted successfully.')
            },
            dataType: 'json'
          });
        });
      });
  });


  // CHANGE PASSWORD
  $(document).on('click', '#changeuserpassword', function(e){
      e.preventDefault();
      $('#changepasswordusermodal').modal('show');
      $('#changepasswordusermodal #user_id').val($(this).data('id'));
  });


</script>
@endsection
