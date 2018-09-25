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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <main class="py-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script type="text/javascript">

      $(document).ready(function() {

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        // ERROR
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error('{{ $error }}', 'ERROR!')
            @endforeach
        @endif

      });

    </script>

    @yield('script')

</body>
</html>
