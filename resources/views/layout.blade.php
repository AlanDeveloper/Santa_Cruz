<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Santa Cruz</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
</head>
<body>

    <div class="container py-3">
        @include('header')
        @yield('content')
    </div>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>
</html>