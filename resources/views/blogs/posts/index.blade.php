@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                  <strong>All Posts</strong>
                  <button type="button" class="btn btn-sm btn-success float-right" id="createpost"><i class="fas fa-plus-circle mr-1"></i>create post</button>
                </div>

                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>SL.</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Published</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($posts as $key => $post)
                      <tr>
                        <th scope="row">{{++$key}}.</th>
                        <td><img src="images/{{$post->image}}" alt="{{$post->title}}" class="rounded" width="50px"></td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->status}}</td>
                        <td>{{$post->published_on}}</td>
                        <td>
                          <button type="button" class="btn btn-sm btn-info" data-id="{{$post->id}}" id="postview"><i class="fas fa-eye"></i></button>
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
{{-- @include('posts.modals.editpost')
@include('posts.modals.viewpost')
@include('posts.modals.deletepost') --}}

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
      $('#posteditmodal #name').val(data.post.name);
      $('#posteditmodal #dateofbirth').val(data.post.dateofbirth);
      $('#editpostbio').summernote('code', data.post.bio);
      $('#posteditmodal #postimageeditpreview').attr('src','images/'+data.post.image);
      $('#posteditmodal #postimageeditpreview').attr('alt',data.post.title);

      $('#posteditmodal #country').val(data.post.country_id);
      $('#posteditmodal #country').trigger('change');

      $('#posteditmodal #language').val(data.post.language_id);
      $('#posteditmodal #language').trigger('change');
    });
  });

  // VIEW POST
  $(document).on('click', '#postview', function(e){
    $('#postviewmodal').modal('show');
    var post = $(this).data('id');
    $.get('posts/'+post, function(data){
      $('#postviewmodal #name').html(data.post.name);
      $('#postviewmodal #country').html(data.post.country.name);
      $('#postviewmodal #language').html(data.post.language.name);
      $('#postviewmodal #dateofbirth').html(data.post.dateofbirth);
      $('#viewpostbio').html(data.post.bio);
      $('#postviewmodal #postimageviewpreview').attr('src','images/'+data.post.image);
      $('#postviewmodal #postimageviewpreview').attr('alt',data.post.title);
    });
  });

  // DELETE POST
  $(document).on('click', '#postdelete', function(e){
    e.preventDefault();
    var delbtntr = $(this).parents('tr');
    var post = $(this).data('id');
    $.get('posts/'+post, function(data){
        $('#postdeletemodal #name').html(data.post.name);
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
