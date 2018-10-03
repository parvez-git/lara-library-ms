@extends('layouts.front')

@section('content')
<div class="container-fluid">

    <div class="pt-4 pb-3 mb-4">
        <div class="container-fluid">
            <h4>
                <i class="fas fa-search mr-2"></i>SEARCHING FOR:
                @isset($_GET['book'])
                    {{-- strtoupper($_GET['book']) --}}
                @endisset
                @if(isset($_GET['yearfrom']) && isset( $_GET['yearto']))
                    YEAR: {{ $_GET['yearfrom'] }} - {{ $_GET['yearto'] }}
                @endif

                <span class="float-right">{{ count($books) }} BOOKS FOUND</span>
            </h4>
        </div>
    </div>


    <div class="row">

        <div class="col-md-8">
            <div class="row">
                @foreach($books as $book)
                    <div class="col-3">
                        <div class="card">
                            <a href="{{ route('frontend.book.show',$book->slug) }}">
                                <img class="card-img-top" src="{{asset("images/$book->image")}}" alt="{{$book->title}}">
                            </a>
                            <div class="card-body">
                                <p class="card-text">{{$book->title}} ({{$book->published_year}})</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-md-4">

            <div class="card rounded-0">

                <div class="card-header">
                    <strong>FILTER BOOKS</strong>
                </div>

                <div class="card-body">

                    <form class="" action="{{ route('frontend.search') }}" method="get">

                        <div class="form-group">
                            <label for="publisher_id"><small><strong>Publisher</strong></small></label>
                            <select class="form-control select2-single" name="publisherid" id="publisher_id">
                                <option selected disabled>-- Select Publisher --</option>
                                @foreach($publishers as $publisher)
                                <option value="{{$publisher->id}}">{{$publisher->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="author_id"><small><strong>Author</strong></small></label>
                            <select class="form-control select2-single" name="authorid" id="author_id">
                                 <option selected disabled>-- Select Author --</option>
                                 @foreach($authors as $author)
                                 <option value="{{$author->id}}">{{$author->name}}</option>
                                 @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="genre_id"><small><strong>Genre</strong></small></label>
                            <select class="form-control select2-single" name="genreid" id="genre_id">
                                 <option selected disabled>-- Select Genre --</option>
                                 @foreach($genres as $genre)
                                 <option value="{{$genre->id}}">{{$genre->name}}</option>
                                 @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label><small><strong>Published Year</strong></small></label>
                            <div class="row">
                                <div class="col">
                                    <select class="form-control select2-single" name="yearfrom">
                                         <option selected disabled>-- FROM --</option>
                                         @foreach($publishedyears as $books)
                                         <option value="{{$books->published_year}}">{{$books->published_year}}</option>
                                         @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <select class="form-control select2-single" name="yearto">
                                         <option selected disabled>-- TO --</option>
                                         @foreach($publishedyears as $books)
                                         <option value="{{$books->published_year}}">{{$books->published_year}}</option>
                                         @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info rounded-0 w-100"><strong>FILTER</strong></button>

                    </form>
                </div>
            </div>

            <div class="card rounded-0 mt-4">

                <div class="card-header">
                    <strong>GENRES</strong>
                </div>

                <div class="card-body">
                    @php
                        $color  = ['primary','secondary','success','danger','warning','info','dark'];
                        $colors = [];
                        $limit  = (int)ceil( count($genres) / count($color) );

                        for ($i=0; $i <= $limit; $i++) {
                            foreach ($color as $value) {
                                $colors[] = $value;
                            }
                        }
                    @endphp

                    @foreach($genres as $key => $genre)
                        <a href="{{ route('frontend.archive',$genre->slug) . '?type=genres' }}" class="badge badge-pill badge-{{ $colors[$key] }} p-2 mb-1">
                            {{ $genre->name }}
                        </a>
                    @endforeach
                </div>
            </div>

        </div>

    </div>

</div>
@endsection
