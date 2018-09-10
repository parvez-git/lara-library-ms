@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                  <strong>All Country</strong>
                  <button type="button" class="btn btn-sm btn-success float-right" id="createcountry"><i class="fas fa-plus-circle mr-1"></i>create country</button>
                </div>

                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>SL.</th>
                        <th>Name</th>
<<<<<<< HEAD
                        <th>Slug</th>
=======
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($countries as $country)
                      <tr>
                        <th scope="row">{{$country->id}}.</th>
                        <td>{{$country->name}}</td>
<<<<<<< HEAD
                        <td>{{$country->slug}}</td>
=======
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
                        <td>
                          <button type="button" class="btn btn-sm btn-info" data-id="{{$country->id}}" id="countryview"><i class="fas fa-eye"></i></button>
                          <button type="button" class="btn btn-sm btn-warning" data-id="{{$country->id}}" id="countryedit"><i class="fas fa-pencil-alt"></i></button>
                          <button type="button" class="btn btn-sm btn-danger" data-id="{{$country->id}}" id="countrydelete"><i class="fas fa-trash"></i></button>
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

@include('countries.modals.createcountry')
@include('countries.modals.editcountry')
@include('countries.modals.viewcountry')
@include('countries.modals.deletecountry')

@endsection


@section('script')
<script type="text/javascript">

  $(document).on('click', '#createcountry', function(e){
    $('#createcountrymodal').modal('show');
  });

  // EDIT country
  $(document).on('click', '#countryedit', function(e){
    $('#countryeditmodal').modal('show');
    var country = $(this).data('id');
    $.get('countries/'+country+'/edit', function(data){
      $('#countryeditmodal #name').val(data.country.name);
    });
  });

  // VIEW country
  $(document).on('click', '#countryview', function(e){
    $('#countryviewmodal').modal('show');
    var country = $(this).data('id');
    $.get('countries/'+country, function(data){
<<<<<<< HEAD
      $('#countryviewmodal form').attr('action','countries/'+data.country.id);
=======
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
      $('#countryviewmodal #name').html(data.country.name);
    });
  });

  // DELETE country
  $(document).on('click', '#countrydelete', function(e){
    e.preventDefault();
    var delbtntr = $(this).parents('tr');
    var country = $(this).data('id');
    $.get('countries/'+country, function(data){
        $('#countrydeletemodal #name').html(data.country.name);
        $('#countrydeletemodal button.btn-danger').attr('id','deletecountry-'+data.country.id);
        $('#countrydeletemodal').modal('show');
        $('#deletecountry-'+data.country.id).on('click', function(e){
          $.ajax({
            type: "DELETE",
            url:'countries/'+data.country.id,
            data: data.country,
            success: function(data){
              delbtntr.remove();
              $('#countrydeletemodal').modal('hide');
<<<<<<< HEAD
              toastr.success('Country deleted successfully.')
=======
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
            },
            dataType: 'json'
          });
        });
      });
  });


</script>
@endsection
