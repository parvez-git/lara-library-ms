@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                  <strong>All Requested Book</strong>
                  <button type="button" class="btn btn-sm btn-success float-right" id="requestedbook"><i class="fas fa-plus-circle mr-1"></i>request book</button>
                </div>

                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>SL.</th>
                        <th>Book</th>

                        @if(auth()->user()->role_id == 2)
                          <th>Requested By</th>
                        @endif

                        <th>Requested Date</th>
                        <th>Responded Date</th>
                        <th>Status</th>
                        <th>Issued Status</th>
                        <th width="90px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($requestedbooks as $requestedbook)
                      <tr>
                        <th scope="row">{{$requestedbook->id}}.</th>
                        <td>{{$requestedbook->book->title}}<em> by {{$requestedbook->book->author->name}}</em></td>

                        @if(auth()->user()->role_id == 2)
                          <td>{{$requestedbook->user->name}} </td>
                        @endif

                        <td>{{ strtok($requestedbook->created_at,' ') }}</td>
                        <td>{{$requestedbook->action_date or null}}</td>

                        <td class="text-center">
                          @if($requestedbook->status == 'pending')
                            <span class="badge badge-warning">Pending</span>
                          @elseif($requestedbook->status == 'accepted')
                            <span class="badge badge-success">Accepted</span>
                          @elseif($requestedbook->status == 'rejected')
                            <span class="badge badge-danger">Rejected</span>
                          @endif
                        </td>

                        {{-- NEED T0 FIX --}}
                        <td>
                          @if($requestedbook->issuedbook)
                            @if($requestedbook->issuedbook->penalty_money)
                              <span class="badge badge-warning">
                                {{$requestedbook->issuedbook->penalty_money}}
                              </span>
                            @else
                              <span class="badge badge-info">{{$requestedbook->issuedbook->status}}</span>
                            @endif
                          @else
                              <span class="badge badge-danger">removed</span>
                          @endif
                        </td>

                        <td>
                          @if(auth()->user()->role_id == 2)
                            <button type="button" class="btn btn-sm btn-warning" data-id="{{$requestedbook->id}}" id="requestedbookedit"><i class="fas fa-pencil-alt"></i></button>
                          @endif

                          @if(auth()->user()->role_id == 3 && $requestedbook->status == 'accepted')
                              <button type="button" class="btn btn-sm btn-danger" disabled><i class="fas fa-trash"></i></button>
                          @else
                              <button type="button" class="btn btn-sm btn-danger" data-id="{{$requestedbook->id}}" id="requestedbookdelete"><i class="fas fa-trash"></i></button>
                          @endif
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>

                <div class="card-foter m-auto">
                    {{ $requestedbooks->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@include('requestedbooks.modals.create')
@include('requestedbooks.modals.edit')
@include('requestedbooks.modals.delete')

@endsection

@section('script')
<script type="text/javascript">

  $(document).on('click', '#requestedbook', function(e){
    $('#requestedbookmodal').modal('show');
  });

  // EDIT
  $(document).on('click', '#requestedbookedit', function(e){
    $('#requestedbookeditmodal').modal('show');
    var id = $(this).data('id');
    $.get('requestedbooks/'+id+'/edit', function(data){
      $('#requestedbookeditmodal form').attr('action','requestedbooks/'+data.requestedbook.id);
      $('#requestedbookeditmodal #bookid').val(data.requestedbook.book_id);
      $('#requestedbookeditmodal #bookid').trigger('change');
      $('#requestedbookeditmodal #userid').val(data.requestedbook.user_id);
      $('#requestedbookeditmodal #userid').trigger('change');
      $('#requestedbookeditmodal #editstatus').val(data.requestedbook.status);
    });
  });

  // DELETE
  $(document).on('click', '#requestedbookdelete', function(e){
    e.preventDefault();
    var delbtntr = $(this).parents('tr');
    var id = $(this).data('id');
    $.get('requestedbooks/'+id, function(data){
        $('#requestedbookdeletemodal #name').html(data.requestedbook.book.title);
        $('#requestedbookdeletemodal button.btn-danger').attr('id','delete-'+data.requestedbook.id);
        $('#requestedbookdeletemodal').modal('show');
        $('#delete-'+data.requestedbook.id).on('click', function(e){
          $.ajax({
            type: "DELETE",
            url:'requestedbooks/'+data.requestedbook.id,
            data: data.requestedbook,
            success: function(data){
              delbtntr.remove();
              $('#requestedbookdeletemodal').modal('hide');
              toastr.success('Requested book deleted successfully.')
            },
            dataType: 'json'
          });
       });
    });
  });

</script>
@endsection
