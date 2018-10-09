@extends('layouts.front')

@section('content')
<div class="container-fluid">

    <div class="pt-4 pb-3 mb-4">
        <div class="container-fluid">
            <h3><i class="fas fa-archive mr-3"></i>ARCHIVE: {{ strtoupper($title) }} </h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="row">
                @if($books)
                    @foreach($books as $book)
                        @if($book)
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
                        @endif
                    @endforeach
                @else
                    <div class="col">
                        <div class="card rounded-0">
                            <div class="card-body">
                                <h3 class="text-center">No Book found</h3>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="col-md-4">

            <div class="card rounded-0">

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

            <div class="card rounded-0 mt-4">
                <div class="card-header">
                    <strong>AUTHORS</strong>
                </div>
                <div class="card-body">
                    @foreach($authors as $author)
                        <a href="{{ route('frontend.author.show',$author->slug) }}" class="btn btn-outline-dark btn-sm w-47">
                            {{ $author->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="card rounded-0 mt-4">
                <div class="card-header">
                    <strong>PUBLISHERS</strong>
                </div>
                <div class="card-body">
                    @foreach($publishers as $publisher)
                        <a href="{{ route('frontend.archive',$publisher->slug) . '?type=publisher' }}" class="btn btn-outline-primary btn-sm w-47">
                            {{ $publisher->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="card rounded-0 mt-4">
                <div class="card-header">
                    <strong>LANGUAGES</strong>
                </div>
                <div class="card-body">
                    @foreach($languages as $language)
                        <a href="{{ route('frontend.archive',$language->slug) . '?type=language' }}" class="btn btn-outline-info btn-sm w-47">
                            {{ $language->name }}
                        </a>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

</div>
@endsection
