<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title>{{ $title }}</title>
</head>

<body>
    @include('layout.navbar')

    <div class="mx-auto min-h-screen">
        @yield('content')
    </div>

    @include('layout.footer')
</body>

</html>
