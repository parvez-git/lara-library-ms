@extends('layouts.front')

@section('content')
<div class="container-fluid">

    <div class="pt-4 pb-3 mb-4">
        <div class="container-fluid">
            <h3><i class="fas fa-th-large mr-3"></i></i>BLOG POST </h3>
        </div>
    </div>

    @foreach($posts as $post)
        <div class="row mb-5">
            <div class="col-md-4">
                <a href="{{ route('frontend.book.show',$post->slug) }}">
                    <img class="card-img-top" src="{{asset("images/$post->image")}}" alt="{{$post->title}}">
                </a>
            </div>
            <div class="col-md-8">
                <h3>{{ $post->title }}</h3>
                <span><i class="far fa-calendar-alt mr-2"></i>{{ $post->created_at }}</span>
                <span class="ml-3"><i class="far fa-user mr-2"></i>{{ $post->user->name }}</span>
                <span class="ml-3">
                    <i class="fas fa-tags mr-1"></i>
                    @foreach($post->categories as $key => $category)
                        @if($key != 0)
                            <span>, </span>
                        @endif
                        {{ $category->name }}
                    @endforeach
                </span>
                <div class="content-body">
                    <p>{!! $post->content !!}</p>
                </div>
            </div>
        </div>
    @endforeach

    <div class="row">
        <div class="m-auto">
            {{ $posts->links() }}
        </div>
    </div>

</div>
@endsection
