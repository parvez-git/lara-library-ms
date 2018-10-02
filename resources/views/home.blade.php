@extends('layouts.front')

@section('content')
<div class="container-fluid">
    <div class="row">

        @foreach($books as $book)
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
        @endforeach

    </div>
    <div class="row mt-5">
        <div class="m-auto">
            {{ $books->links() }}
        </div>
    </div>
</div>
@endsection
