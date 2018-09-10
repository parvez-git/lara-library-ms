@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                  <strong>All genre</strong>
                  <button type="button" class="btn btn-sm btn-success float-right" id="creategenre"><i class="fas fa-plus-circle mr-1"></i>create genre</button>
                </div>

                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>SL.</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($genres as $genre)
                      <tr>
                        <th scope="row">{{$genre->id}}.</th>
                        <td>{{$genre->name}}</td>
                        <td>{{$genre->slug}}</td>
                        <td>
                          <button type="button" class="btn btn-sm btn-info" data-id="{{$genre->id}}" id="genreview"><i class="fas fa-eye"></i></button>
                          <button type="button" class="btn btn-sm btn-warning" data-id="{{$genre->id}}" id="genreedit"><i class="fas fa-pencil-alt"></i></button>
                          <button type="button" class="btn btn-sm btn-danger" data-id="{{$genre->id}}" id="genredelete"><i class="fas fa-trash"></i></button>
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

@include('genres.modals.creategenre')
@include('genres.modals.editgenre')
@include('genres.modals.viewgenre')
@include('genres.modals.deletegenre')

@endsection


@section('script')
<script type="text/javascript">

  $(document).on('click', '#creategenre', function(e){
    $('#creategenremodal').modal('show');
  });

  // EDIT genre
  $(document).on('click', '#genreedit', function(e){
    $('#genreeditmodal').modal('show');
    var genre = $(this).data('id');
    $.get('genres/'+genre+'/edit', function(data){
      $('#genreeditmodal form').attr('action','genres/'+data.genre.id);
      $('#genreeditmodal #name').val(data.genre.name);
    });
  });

  // VIEW genre
  $(document).on('click', '#genreview', function(e){
    $('#genreviewmodal').modal('show');
    var genre = $(this).data('id');
    $.get('genres/'+genre, function(data){
      $('#genreviewmodal #name').html(data.genre.name);
    });
  });

  // DELETE genre
  $(document).on('click', '#genredelete', function(e){
    e.preventDefault();
    var delbtntr = $(this).parents('tr');
    var genre = $(this).data('id');
    $.get('genres/'+genre, function(data){
        $('#genredeletemodal #name').html(data.genre.name);
        $('#genredeletemodal button.btn-danger').attr('id','deletegenre-'+data.genre.id);
        $('#genredeletemodal').modal('show');
        $('#deletegenre-'+data.genre.id).on('click', function(e){
          $.ajax({
            type: "DELETE",
            url:'genres/'+data.genre.id,
            data: data.genre,
            success: function(data){
              delbtntr.remove();
              $('#genredeletemodal').modal('hide');
            },
            dataType: 'json'
          });
        });
      });
  });


</script>
@endsection
