@extends('layouts.front')

@section('content')
<div class="container-fluid">

    <div class="pt-4 pb-3 mb-4">
        <div class="container-fluid">
            <h3><i class="far fa-user mr-2"></i>AUTHOR LIST</h3>
        </div>
    </div>

    <div class="row">

        @foreach($authors as $author)
            <div class="col-2">
                <div class="card mb-4">
                    <a href="{{ route('frontend.author.show',$author->slug) }}">
                        <img class="card-img-top" src="{{ asset("images/$author->image") }}" alt="{{$author->name}}">
                    </a>
                    <div class="card-body">
                        <p class="card-text text-center">{{$author->name}} <br> ({{$author->country->name}})</p>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <div class="row mt-5">
        <div class="m-auto">
            {{ $authors->links() }}
        </div>
    </div>
</div>
@endsection
