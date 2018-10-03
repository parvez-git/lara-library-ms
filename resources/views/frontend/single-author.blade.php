@extends('layouts.front')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-3">
            <div class="card">
                <img class="card-img-top" src="{{asset("images/$author->image")}}" alt="{{$author->name}}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="card rounded-0">
                <div class="card-body">
                    <h2 class="card-title">{{$author->name}}</h2>
                    <h5 class="card-title">Language:
                        <a href="{{ route('frontend.archive',$author->language->slug) . '?type=language' }}">
                            {{$author->language->name}}
                        </a>
                    </h5>
                    <h5 class="card-title">Country:
                        <a href="{{ route('frontend.authors') . "?type=country&id=$author->country_id" }}">
                            {{$author->country->name}}
                        </a>
                    </h5>
                    <h5 class="card-title">Date of Birth: {{$author->dateofbirth}}</h5>
                    <p class="card-text">{!! $author->bio !!}</p>
                 </div>
            </div>
        </div>

        <div class="col-md-5">
            
            <div class="row">
                @foreach($authorbooks as $key => $book)
                    @if($key < 6)
                        <div class="col-4 mb-4">
                            <div class="card authbook">
                                <img class="card-img" src="{{asset("images/$book->image")}}" alt="{{$book->title}}">
                                <div class="card-img-overlay authbooktitle">
                                    <a href="{{ route('frontend.book.show',$book->slug) }}">
                                        {{str_limit($book->title, 50, '....')}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            @if(count($authorbooks) > 6)
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-white w-100 rounded-0">MORE BOOK</button>
                </div>
            </div>
            @endif

        </div>

    </div>
</div>
@endsection
