@extends('layouts.front')

@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col">
            <div class="card">
                <img class="card-img-top" src="{{asset("images/$book->image")}}" alt="{{$book->title}}">
            </div>
        </div>

        <div class="col">
            <div class="card rounded-0">
                <div class="card-body">
                    <h2 class="card-title">{{$book->title}}</h2>
                    <h5 class="card-title">{{$book->published_year}}</h5>
                    <p class="card-text">{!! $book->description !!}</p>
                 </div>
            </div>
        </div>

        <div class="col">
            <div class="bg-white">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Publisher:</th>
                            <th>
                                <a href="{{ route('frontend.archive',$book->publisher->slug) . '?type=publisher' }}">
                                    {{ $book->publisher->name }}
                                </a>
                            </th>
                        </tr>
                        <tr>
                            <th>Genres:</th>
                            <th>
                                @foreach($book->genres as $genre)
                                    <a href="{{ route('frontend.archive',$genre->slug) . '?type=genres' }}" class="badge badge-pill badge-dark pt-1">
                                        {{ $genre->name }}
                                    </a>
                                @endforeach
                            </th>
                        </tr>
                        <tr>
                            <th>Author:</th>
                            <th>
                                <a href="{{ route('frontend.author.show',$book->author->slug) }}">
                                    {{ $book->author->name }}
                                </a>
                            </th>
                        </tr>
                        <tr>
                            <th>Pages:</th>
                            <th>{{ $book->pages }}</th>
                        </tr>
                        <tr>
                            <th>Language:</th>
                            <th>
                                <a href="{{ route('frontend.archive',$book->language->slug) . '?type=language' }}">
                                    {{ $book->language->name }}
                                </a>
                            </th>
                        </tr>
                        <tr>
                            <th>ISBN:</th>
                            <th>{{ $book->ISBN }}</th>
                        </tr>

                        @if($book->series_id)
                            <tr>
                                <th>Series:</th>
                                <th>
                                    <a href="{{ route('frontend.archive',$book->series->slug) . '?type=series' }}">
                                        {{ $book->series->name }}
                                    </a>
                                </th>
                            </tr>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection
