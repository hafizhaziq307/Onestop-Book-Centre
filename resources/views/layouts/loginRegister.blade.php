<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('../css/app.css') }}">
    <link rel="icon" href="{{ asset('uploads/icon.png') }}" sizes="32x32">
    <title>Onestop Book Centre</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine.min.js" defer></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <style>
        body {
            background-image: url("uploads/background.webp");
            background-repeat: no-repeat, repeat;
        }

        .user-radio:checked+label {
            background-color: #2563EB;
        }

    </style>
</head>

<body class="text-gray-300 bg-gray-800">
    @yield('content')
</body>

</html>
