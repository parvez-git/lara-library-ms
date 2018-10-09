<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Library Management System') }}</title>

    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('css/fa-svg-with-js.css') }}" rel="stylesheet">
    <link href="{{ asset('css/summernote.css') }}" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">

            @include('layouts.navbar')

        </nav>

        <main class="py-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3">
                        @include('layouts.sidebar')
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
            format: 'yyyy-mm-dd',
            todayHighlight: true
        });


        // ERROR
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error('{{ $error }}', 'ERROR!')
            @endforeach
        @endif

        // SESSION SUCCESS
        @if (session('success'))
            toastr.success('{{ session('success') }}')
        @endif

        // SESSION ERROR
        @if (session('error'))
            toastr.error('{{ session('error') }}')
        @endif

      });

    </script>

    @yield('script')

</body>
</html>
