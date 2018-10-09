@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                  <strong>All Posts</strong>
                  <button type="button" class="btn btn-sm btn-success float-right" id="createpost">
                      <i class="fas fa-plus-circle mr-1"></i>create post
                  </button>
                </div>

                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>SL.</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Posted By</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Published On</th>
                        <th width="90px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($posts as $key => $post)
                      <tr>
                        <th scope="row">{{++$key}}.</th>
                        <td><img src="images/{{$post->image}}" alt="{{$post->title}}" class="rounded" width="50px"></td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>
                            @foreach($post->categories as $category)
                                <span class="badge badge-pill badge-secondary pt-1">
                                    {{ $category->name }}
                                </span>
                            @endforeach
                        </td>
                        <td>
                            @if($post->status)
                                <span class="badge badge-success p-1">Published</span>
                            @else
                                <span class="badge badge-warning p-1">Pending</span>
                            @endif
                        </td>
                        <td>{{$post->published_on}}</td>
                        <td>
                          <button type="button" class="btn btn-sm btn-warning" data-id="{{$post->id}}" id="postedit"><i class="fas fa-pencil-alt"></i></button>
                          <button type="button" class="btn btn-sm btn-danger" data-id="{{$post->id}}" id="postdelete"><i class="fas fa-trash"></i></button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>

                <div class="card-foter m-auto">
                    {{ $posts->links() }}
                </div>

            </div>
        </div>
    </div>
</div>

@include('blogs.posts.modals.create')
@include('blogs.posts.modals.edit')
@include('blogs.posts.modals.delete')

@endsection


@section('script')
<script type="text/javascript">

  $(document).on('click', '#createpost', function(e){
    $('#createpostmodal').modal('show');
  });

  // EDIT POST
  $(document).on('click', '#postedit', function(e){
    $('#posteditmodal').modal('show');
    var post = $(this).data('id');
    $.get('posts/'+post+'/edit', function(data){
      $('#posteditmodal form').attr('action', 'posts/'+data.post.id);
      $('#posteditmodal #edittitle').val(data.post.title);
      $('#posteditmodal #editpublishedon').val(data.post.published_on);
      $('#editpostcontent').summernote('code', data.post.content);
      $('#posteditmodal #postimageeditpreview').attr('src','images/'+data.post.image);
      $('#posteditmodal #postimageeditpreview').attr('alt',data.post.title);

      $('#posteditmodal #editstatus').val(data.post.status);
      $('#posteditmodal #editstatus').trigger('change');

      $('#posteditmodal #editshortcontent').val(data.post.short_content);
      $('#posteditmodal #editmetatitle').val(data.post.meta_title);
      $('#posteditmodal #editmetakeywords').val(data.post.meta_keywords);
      $('#posteditmodal #editmetadescription').val(data.post.meta_description);

      var category_arr = [];
        data.post.categories.forEach(function(element) {
        category_arr.push(element.id)
      });
      $('#posteditmodal #editcategory').val(category_arr);
      $('#posteditmodal #editcategory').trigger('change');
    });
  });

  // VIEW POST
  // $(document).on('click', '#postview', function(e){
  //   $('#postviewmodal').modal('show');
  //   var post = $(this).data('id');
  //   $.get('posts/'+post, function(data){
  //
  //   });
  // });

  // DELETE POST
  $(document).on('click', '#postdelete', function(e){
    e.preventDefault();
    var delbtntr = $(this).parents('tr');
    var post = $(this).data('id');
    $.get('posts/'+post, function(data){
        $('#postdeletemodal #name').html(data.post.title);
        $('#postdeletemodal button.btn-danger').attr('id','deletepost-'+data.post.id);
        $('#postdeletemodal').modal('show');
        $('#deletepost-'+data.post.id).on('click', function(e){
          $.ajax({
            type: "DELETE",
            url:'posts/'+data.post.id,
            data: data.post,
            success: function(data){
              delbtntr.remove();
              $('#postdeletemodal').modal('hide');
              toastr.success('post deleted successfully.')
            },
            dataType: 'json'
          });
        });
      });
  });

  // SUMMERNOTE EDITOR
  $('#createpostcontent').summernote({
     placeholder: 'Content goes here..',
     height: 200,
     focus: true,
     dialogsInBody: true,
  });
  $('.note-popover').css({'display': 'none'});


  // IMAGE UPLOAD PREVIEW
  function readURL(input, previewid) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $(previewid).attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#postimageedit").change(function() {
    readURL(this, '#postimageeditpreview');
  });
  $("#postimagecreate").change(function() {
    readURL(this, '#postimagecreatepreview');
  });

</script>
@endsection
