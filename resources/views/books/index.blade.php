@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                  <strong>All Book</strong>
                  <button type="button" class="btn btn-sm btn-success float-right" id="createbook"><i class="fas fa-plus-circle mr-1"></i>create book</button>
                </div>

                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>SL.</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>ISBN</th>
                        <th>Quantity</th>
<<<<<<< HEAD
                        <th>Issued</th>
                        <th width="130px">Action</th>
=======
                        <th>Action</th>
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($books as $book)
                      <tr>
                        <th scope="row">{{$book->id}}.</th>
                        <td><img src="images/{{$book->image}}" alt="{{$book->title}}" class="rounded" width="80px"></td>
                        <td>
                          <h4>{{$book->title}}</h4>
<<<<<<< HEAD
                          Year:       <strong>{{$book->published_year}}</strong> <br>
                          Author:     <strong>{{$book->author->name}}</strong> <br>
                          Publisher:  <strong>{{$book->publisher->name}}</strong> <br>
                          Language:   <strong>{{$book->language->name}}</strong> <br>
                          Genre:
                            @foreach($book->genres as $genre)
                            <span class="badge badge-info">{{$genre->name}}</span>
                            @endforeach
                          <br>
                        </td>
                        <td>{{$book->ISBN}}</td>
                        <td>{{$book->quantity}}</td>
                        <td>{{$book->issuedbooks_count}}</td>
                        <td class="text-center">
=======
                          Year: <strong>{{$book->published_year}}</strong> <br>
                          Author: <strong>{{$book->author_id}}</strong> <br>
                          Genre: <strong>{{$book->genre}}</strong> <br>
                          Publisher: <strong>{{$book->publisher}}</strong> <br>
                        </td>
                        <td>{{$book->ISBN}}</td>
                        <td>{{$book->quantity}}</td>
                        <td>
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
                          <button type="button" class="btn btn-sm btn-info" data-id="{{$book->id}}" id="bookview"><i class="fas fa-eye"></i></button>
                          <button type="button" class="btn btn-sm btn-warning" data-id="{{$book->id}}" id="bookedit"><i class="fas fa-pencil-alt"></i></button>
                          <button type="button" class="btn btn-sm btn-danger" data-id="{{$book->id}}" id="bookdelete"><i class="fas fa-trash"></i></button>
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

@include('books.modals.createbook')
@include('books.modals.editbook')
@include('books.modals.viewbook')
@include('books.modals.deletebook')

@endsection


@section('script')
<script type="text/javascript">

  $(document).on('click', '#createbook', function(e){
<<<<<<< HEAD
    e.preventDefault();
    $('#createbookmodal').modal('show');
  });


  // EDIT BOOK
  $(document).on('click', '#bookedit', function(e){
    e.preventDefault();
    $('#bookeditmodal').modal('show');
    var book = $(this).data('id');
    $.get('books/'+book+'/edit', function(data){
      $('#bookeditmodal form').attr('action','books/'+data.book.id);
      $('#bookeditmodal #title').val(data.book.title);
      $('#bookeditmodal #subtitle').val(data.book.subtitle);
      $('#bookeditmodal #ISBN').val(data.book.ISBN);
=======
    $('#createbookmodal').modal('show');
  });

  // EDIT BOOK
  $(document).on('click', '#bookedit', function(e){
    $('#bookeditmodal').modal('show');
    var book = $(this).data('id');
    $.get('books/'+book+'/edit', function(data){
      $('#bookeditmodal #title').val(data.book.title);
      $('#bookeditmodal #subtitle').val(data.book.subtitle);
      $('#bookeditmodal #ISBN').val(data.book.ISBN);
      $('#bookeditmodal #series').val(data.book.series);
      $('#bookeditmodal #publisher').val(data.book.publisher);
      $('#bookeditmodal #author').val(data.book.author_id);
      $('#bookeditmodal #genre').val(data.book.genre);
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
      $('#bookeditmodal #edition').val(data.book.edition);
      $('#bookeditmodal #published_year').val(data.book.published_year);
      $('#bookeditmodal #pages').val(data.book.pages);
      $('#bookeditmodal #binding').val(data.book.binding);
      $('#bookeditmodal #quantity').val(data.book.quantity);
      $('#bookeditmodal #price').val(data.book.price);
<<<<<<< HEAD
      $('#bookeditmodal #description').summernote('code', data.book.description);
      $('#bookeditmodal #bookimageeditpreview').attr('src','images/'+data.book.image);
      $('#bookeditmodal #bookimageeditpreview').attr('alt',data.book.title);

      $('#bookeditmodal #series').val(data.book.series_id);
      $('#bookeditmodal #series').trigger('change');

      $('#bookeditmodal #publisher').val(data.book.publisher_id);
      $('#bookeditmodal #publisher').trigger('change');

      $('#bookeditmodal #author').val(data.book.author_id);
      $('#bookeditmodal #author').trigger('change');

      $('#bookeditmodal #language').val(data.book.language_id);
      $('#bookeditmodal #language').trigger('change');

      var genre_arr = [];
      data.book.genres.forEach(function(element) {
        genre_arr.push(element.id)
      });
      $('#bookeditmodal #genre').val(genre_arr);
      $('#bookeditmodal #genre').trigger('change');

=======
      $('#bookeditmodal #language').val(data.book.language);
      $('#bookeditmodal #description').summernote('code', data.book.description);
      $('#bookeditmodal #bookimageeditpreview').attr('src','images/'+data.book.image);
      $('#bookeditmodal #bookimageeditpreview').attr('alt',data.book.title);
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
    });
  });

  // VIEW BOOK
  $(document).on('click', '#bookview', function(e){
<<<<<<< HEAD
    e.preventDefault();
=======
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
    $('#bookviewmodal').modal('show');
    var book = $(this).data('id');
    $.get('books/'+book, function(data){
      $('#bookviewmodal #title').html(data.book.title);
      $('#bookviewmodal #subtitle').html(data.book.subtitle);
      $('#bookviewmodal #ISBN').html(data.book.ISBN);
      $('#bookviewmodal #series').html(data.book.series);
<<<<<<< HEAD
      $('#bookviewmodal #publisher').html(data.book.publisher.name);
      $('#bookviewmodal #author').html(data.book.author.name);
=======
      $('#bookviewmodal #publisher').html(data.book.publisher);
      $('#bookviewmodal #author').html(data.book.author_id);
      $('#bookviewmodal #genre').html(data.book.genre);
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
      $('#bookviewmodal #edition').html(data.book.edition);
      $('#bookviewmodal #published_year').html(data.book.published_year);
      $('#bookviewmodal #pages').html(data.book.pages);
      $('#bookviewmodal #binding').html(data.book.binding);
      $('#bookviewmodal #quantity').html(data.book.quantity);
      $('#bookviewmodal #price').html(data.book.price);
<<<<<<< HEAD
      $('#bookviewmodal #language').html(data.book.language.name);
      $('#bookviewmodal #description').html(data.book.description);
      $('#bookviewmodal #bookimageviewpreview').attr('src','images/'+data.book.image);
      $('#bookviewmodal #bookimageviewpreview').attr('alt',data.book.title);

      var genre_list = '';
      data.book.genres.forEach(function(element) {
        genre_list += '<span class="badge badge-info">' + element.name + '</span>';
      });
      $('#bookviewmodal #genre').html(genre_list);

=======
      $('#bookviewmodal #language').html(data.book.language);
      $('#bookviewmodal #description').html(data.book.description);
      $('#bookviewmodal #bookimageviewpreview').attr('src','images/'+data.book.image);
      $('#bookviewmodal #bookimageviewpreview').attr('alt',data.book.title);
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
    });
  });

  // DELETE BOOK
  $(document).on('click', '#bookdelete', function(e){
    e.preventDefault();
    var delbtntr = $(this).parents('tr');
    var book = $(this).data('id');
    $.get('books/'+book, function(data){
        $('#bookdeletemodal #title').html(data.book.title);
        $('#bookdeletemodal button.btn-danger').attr('id','deletebook-'+data.book.id);
        $('#bookdeletemodal').modal('show');
        $('#deletebook-'+data.book.id).on('click', function(e){
          $.ajax({
            type: "DELETE",
            url:'books/'+data.book.id,
            data: data.book,
            success: function(data){
              delbtntr.remove();
              $('#bookdeletemodal').modal('hide');
<<<<<<< HEAD
              toastr.success('Book deleted successfully.')
=======
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
            },
            dataType: 'json'
          });
        });
      });
  });

  // SUMMERNOTE EDITOR
  $('#createbookmodal #description').summernote({
    placeholder: 'Book description goes here..',
    height: 200,
    focus: true
  });


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
  $("#bookimageedit").change(function() {
    readURL(this, '#bookimageeditpreview');
  });
  $("#bookimagecreate").change(function() {
    readURL(this, '#bookimagecreatepreview');
  });

</script>
@endsection
