@extends('layouts.front')

@section('content')
<div class="container-fluid">

    <div class="pt-4 pb-3 mb-4">
        <div class="container-fluid">
            <h3><i class="fas fa-archive mr-2"></i>ARCHIVE: {{ strtoupper($title) }} </h3>
        </div>
    </div>

    <div class="row">

        @if($books)
            @foreach($books as $book)
                @if($book)
                    <div class="col-2">
                        <div class="card">
                            <a href="{{ route('frontend.book.show',$book->slug) }}">
                                <img class="card-img-top" src="{{asset("images/$book->image")}}" alt="{{$book->title}}">
                            </a>
                            <div class="card-body">
                                <p class="card-text">{{$book->title}} ({{$book->published_year}})</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @else
            <div class="col"></div>
            <div class="col">
                <div class="card rounded-0">
                    <div class="card-body">
                        <h3 class="text-center">No Book found</h3>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        @endif

    </div>

</div>
@endsection
