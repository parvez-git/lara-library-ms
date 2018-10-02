@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                  <strong>All Language</strong>
                  <button type="button" class="btn btn-sm btn-success float-right" id="createlanguage"><i class="fas fa-plus-circle mr-1"></i>create language</button>
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
                      @foreach($languages as $language)
                      <tr>
                        <th scope="row">{{$language->id}}.</th>
                        <td>{{$language->name}}</td>
                        <td>{{$language->slug}}</td>
                        <td>
                          <button type="button" class="btn btn-sm btn-info" data-id="{{$language->id}}" id="languageview"><i class="fas fa-eye"></i></button>
                          <button type="button" class="btn btn-sm btn-warning" data-id="{{$language->id}}" id="languageedit"><i class="fas fa-pencil-alt"></i></button>
                          <button type="button" class="btn btn-sm btn-danger" data-id="{{$language->id}}" id="languagedelete"><i class="fas fa-trash"></i></button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>

                <div class="card-foter m-auto">
                    {{ $languages->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@include('languages.modals.createlanguage')
@include('languages.modals.editlanguage')
@include('languages.modals.viewlanguage')
@include('languages.modals.deletelanguage')

@endsection


@section('script')
<script type="text/javascript">

  $(document).on('click', '#createlanguage', function(e){
    $('#createlanguagemodal').modal('show');
  });

  // EDIT language
  $(document).on('click', '#languageedit', function(e){
    $('#languageeditmodal').modal('show');
    var language = $(this).data('id');
    $.get('languages/'+language+'/edit', function(data){
      $('#languageeditmodal form').attr('action','languages/'+data.language.id);
      $('#languageeditmodal #name').val(data.language.name);
    });
  });

  // VIEW language
  $(document).on('click', '#languageview', function(e){
    $('#languageviewmodal').modal('show');
    var language = $(this).data('id');
    $.get('languages/'+language, function(data){
      $('#languageviewmodal #name').html(data.language.name);
    });
  });

  // DELETE language
  $(document).on('click', '#languagedelete', function(e){
    e.preventDefault();
    var delbtntr = $(this).parents('tr');
    var language = $(this).data('id');
    $.get('languages/'+language, function(data){
        $('#languagedeletemodal #name').html(data.language.name);
        $('#languagedeletemodal button.btn-danger').attr('id','deletelanguage-'+data.language.id);
        $('#languagedeletemodal').modal('show');
        $('#deletelanguage-'+data.language.id).on('click', function(e){
          $.ajax({
            type: "DELETE",
            url:'languages/'+data.language.id,
            data: data.language,
            success: function(data){
              delbtntr.remove();
              $('#languagedeletemodal').modal('hide');
            },
            dataType: 'json'
          });
        });
      });
  });


</script>
@endsection
