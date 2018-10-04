@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                  <strong>All Category</strong>
                  <button type="button" class="btn btn-sm btn-success float-right" id="createcategory"><i class="fas fa-plus-circle mr-1"></i>create category</button>
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
                      @foreach($categories as $category)
                      <tr>
                        <th scope="row">{{$category->id}}.</th>
                        <td>{{$category->name}}</td>
                        <td>{{$category->slug}}</td>
                        <td>
                          <button type="button" class="btn btn-sm btn-info" data-id="{{$category->id}}" id="categoryview"><i class="fas fa-eye"></i></button>
                          <button type="button" class="btn btn-sm btn-warning" data-id="{{$category->id}}" id="categoryedit"><i class="fas fa-pencil-alt"></i></button>
                          <button type="button" class="btn btn-sm btn-danger" data-id="{{$category->id}}" id="categorydelete"><i class="fas fa-trash"></i></button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>

                <div class="card-foter m-auto">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@include('blogs.categories.modals.create')
{{-- @include('categories.modals.editcategory')
@include('categories.modals.viewcategory')
@include('categories.modals.deletecategory') --}}

@endsection


@section('script')
<script type="text/javascript">

  $(document).on('click', '#createcategory', function(e){
    $('#createcategorymodal').modal('show');
  });

  // EDIT category
  $(document).on('click', '#categoryedit', function(e){
    $('#categoryeditmodal').modal('show');
    var category = $(this).data('id');
    $.get('categories/'+category+'/edit', function(data){
      $('#categoryeditmodal #name').val(data.category.name);
    });
  });

  // VIEW category
  $(document).on('click', '#categoryview', function(e){
    $('#categoryviewmodal').modal('show');
    var category = $(this).data('id');
    $.get('categories/'+category, function(data){
      $('#categoryviewmodal form').attr('action','categories/'+data.category.id);
      $('#categoryviewmodal #name').html(data.category.name);
    });
  });

  // DELETE category
  $(document).on('click', '#categorydelete', function(e){
    e.preventDefault();
    var delbtntr = $(this).parents('tr');
    var category = $(this).data('id');
    $.get('categories/'+category, function(data){
        $('#categorydeletemodal #name').html(data.category.name);
        $('#categorydeletemodal button.btn-danger').attr('id','deletecategory-'+data.category.id);
        $('#categorydeletemodal').modal('show');
        $('#deletecategory-'+data.category.id).on('click', function(e){
          $.ajax({
            type: "DELETE",
            url:'categories/'+data.category.id,
            data: data.category,
            success: function(data){
              delbtntr.remove();
              $('#categorydeletemodal').modal('hide');
              toastr.success('category deleted successfully.')
            },
            dataType: 'json'
          });
        });
      });
  });


</script>
@endsection
