@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                  <strong>All Publisher</strong>
                  <button type="button" class="btn btn-sm btn-success float-right" id="createpublisher"><i class="fas fa-plus-circle mr-1"></i>create publisher</button>
                </div>

                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>SL.</th>
                        <th>Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($publishers as $publisher)
                      <tr>
                        <th scope="row">{{$publisher->id}}.</th>
                        <td>{{$publisher->name}}</td>
                        <td>
                          <button type="button" class="btn btn-sm btn-info" data-id="{{$publisher->id}}" id="publisherview"><i class="fas fa-eye"></i></button>
                          <button type="button" class="btn btn-sm btn-warning" data-id="{{$publisher->id}}" id="publisheredit"><i class="fas fa-pencil-alt"></i></button>
                          <button type="button" class="btn btn-sm btn-danger" data-id="{{$publisher->id}}" id="publisherdelete"><i class="fas fa-trash"></i></button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('publishers.modals.createpublisher')
@include('publishers.modals.editpublisher')
@include('publishers.modals.viewpublisher')
@include('publishers.modals.deletepublisher')

@endsection


@section('script')
<script type="text/javascript">

  $(document).on('click', '#createpublisher', function(e){
    $('#createpublishermodal').modal('show');
  });

  // EDIT publisher
  $(document).on('click', '#publisheredit', function(e){
    $('#publishereditmodal').modal('show');
    var publisher = $(this).data('id');
    $.get('publishers/'+publisher+'/edit', function(data){
      $('#publishereditmodal #name').val(data.publisher.name);
      $('#publishereditmodal #address').val(data.publisher.address);
    });
  });

  // VIEW publisher
  $(document).on('click', '#publisherview', function(e){
    $('#publisherviewmodal').modal('show');
    var publisher = $(this).data('id');
    $.get('publishers/'+publisher, function(data){
      $('#publisherviewmodal #name').html(data.publisher.name);
      $('#publisherviewmodal #address').html(data.publisher.address);
    });
  });

  // DELETE publisher
  $(document).on('click', '#publisherdelete', function(e){
    e.preventDefault();
    var delbtntr = $(this).parents('tr');
    var publisher = $(this).data('id');
    $.get('publishers/'+publisher, function(data){
        $('#publisherdeletemodal #name').html(data.publisher.name);
        $('#publisherdeletemodal button.btn-danger').attr('id','deletepublisher-'+data.publisher.id);
        $('#publisherdeletemodal').modal('show');
        $('#deletepublisher-'+data.publisher.id).on('click', function(e){
          $.ajax({
            type: "DELETE",
            url:'publishers/'+data.publisher.id,
            data: data.publisher,
            success: function(data){
              delbtntr.remove();
              $('#publisherdeletemodal').modal('hide');
            },
            dataType: 'json'
          });
        });
      });
  });


</script>
@endsection
