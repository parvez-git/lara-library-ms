<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('css/fa-svg-with-js.css') }}" rel="stylesheet">
    <link href="{{ asset('css/summernote.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/datepicker.min.css') }}" rel="stylesheet"> -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3">
                          <div class="card card-default">
                              <div class="card-header">Dashboard</div>

                              <div class="card-body">

                                  <div class="dashboard-sidebar">
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

                                      <ul class="list-group mt-3">
                                          <li class="list-group-item"><a href="{{ route('users.index') }}">All Users</a></li>
                                      </ul>
                                  </div>

                              </div>
                        </div>
                    </div>
                    <div class="col-9">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/fontawesome-all.min.js') }}"></script>
    <script src="{{ asset('js/summernote.min.js') }}"></script>
    <!-- <script src="{{ asset('js/datepicker.min.js') }}"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js" charset="utf-8"></script>

    <script type="text/javascript">

      $(document).ready(function() {

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        // SELECT2
        $('.select2-single').select2({
            width: 'resolve',
            placeholder: '-- Select --',
        });
        $('.select2-multiple').select2({
            placeholder: '-- Select --',
        });

        // BOOTSTRAP-DATEPICKER
        $('.datepicker').datepicker({
          format: 'yyyy-mm-dd'
        });


        // ERROR
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error('{{ $error }}', 'ERROR!')
            @endforeach
        @endif

        // SUCCESS
        @if (session('success'))
            toastr.success('{{ session('success') }}')
        @endif

      });

    </script>

    @yield('script')

</body>
</html>