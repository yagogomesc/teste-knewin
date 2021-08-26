<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Noticias - @yield('title')</title>

    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
</head>
<body>
    <main class="container">
        @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{session('error')}}</div>
        @endif

        @yield('content')
    </main>

    <script src="{{ asset('js/app.js')}}"></script>
</body>
</html>