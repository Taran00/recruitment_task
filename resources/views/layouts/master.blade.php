<!DOCTYPE html>
<html lang="en">
<head>
    {{-- Meta data --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Panda project">
    <title>Panda project</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600|Rubik:400,500&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.rawgit.com/theus/chart.css/v1.0.0/dist/chart.css" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    @include('layouts.nav')

        @if(session()->has('dangerMsg'))
        <div class="alert alert-danger animated faster fadeInDown">
               {{ session()->get('dangerMsg') }}
        </div>
        @endif

        @if(session()->has('successMsg'))
        <div class="alert alert-success animated faster fadeInDown">
               {{ session()->get('successMsg') }}
        </div>
        @endif

      <main class="py-4">
            @yield('content')
      </main>
    
</body>
</html>