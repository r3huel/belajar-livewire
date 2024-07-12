<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Task List</title>

    @livewireStyles
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="container mx-auto mt-8">
        @yield('content')
    </div>

    @livewireScripts
    @vite('resources/js/app.js')
</body>
</html>
