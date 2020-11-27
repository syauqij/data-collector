<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page_title')</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-100">
    @include('partials.navbar')
    
    @section('header')
    
    @show

    <main>
        <div class="max-w-7xl mx-auto p-6 py-6 sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>
</body>
</html>