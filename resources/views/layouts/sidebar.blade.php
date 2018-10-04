<div class="card card-default">
    <div class="card-header">Dashboard</div>

    <div class="card-body">

        <div class="dashboard-sidebar">

            @if( auth()->user() && (auth()->user()->role->slug == 'admin' || auth()->user()->role->slug == 'liberian') )
            <ul class="list-group">
                <li class="list-group-item">Books</li>
                <li class="list-group-item"><a href="{{route('books.index')}}">All Book</a></li>
                <li class="list-group-item"><a href="{{route('authors.index')}}">Authors</a></li>
                <li class="list-group-item"><a href="{{route('countries.index')}}">Countries</a></li>
                <li class="list-group-item"><a href="{{route('languages.index')}}">Languages</a></li>
                <li class="list-group-item"><a href="{{route('series.index')}}">Series</a></li>
                <li class="list-group-item"><a href="{{route('publishers.index')}}">Publishers</a></li>
                <li class="list-group-item"><a href="{{route('genres.index')}}">Genres</a></li>
            </ul>
            <ul class="list-group mt-3">
                <li class="list-group-item"><a href="{{ route('issuedbooks.index') }}">Issued Books</a></li>
            </ul>
            @endif

            <ul class="list-group mt-3">
                <li class="list-group-item"><a href="{{ route('requestedbooks.index') }}">Requeted Books</a></li>
            </ul>

            @if( auth()->user() && (auth()->user()->role->slug == 'admin' || auth()->user()->role->slug == 'liberian') )
            <ul class="list-group mt-3">
                <li class="list-group-item"><a href="{{ route('users.index') }}">All Users</a></li>
            </ul>
            @endif

            <ul class="list-group mt-3">
                <li class="list-group-item">Blog</li>
                <li class="list-group-item"><a href="{{route('posts.index')}}">All Posts</a></li>
                <li class="list-group-item"><a href="{{route('categories.index')}}">Categories</a></li>
            </ul>

            @if( auth()->user() && auth()->user()->role->slug == 'admin' )
            <ul class="list-group mt-3">
                <li class="list-group-item"><a href="{{ route('settings.index') }}">Settings</a></li>
            </ul>
            @endif
        </div>

    </div>
</div>
