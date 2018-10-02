@extends('layouts.front')

@section('content')
<div class="container">
    <div class="row">

        <div class="col">
            <div class="card">
                <img class="card-img-top" src="{{asset("images/$author->image")}}" alt="{{$author->name}}">
            </div>
        </div>

        <div class="col">
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

        <div class="col">
            <div class="bg-white">

            </div>
        </div>

    </div>
</div>
@endsection
