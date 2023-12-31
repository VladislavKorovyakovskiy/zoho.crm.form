<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/app.css">
    <title>Форма отправки данных</title>
</head>

<body>
    <div class="main">
        <div class="error">
        @yield('error')
        </div>

        @yield('content')
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>