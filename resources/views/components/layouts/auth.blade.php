<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        <title>{{ $title ?? 'Page Title' }}</title>
    </head>
    <body>
        <div class="min-h-screen bg-gray-100 flex items-center justify-center">
            {{ $slot }}
        </div>
    </body>
</html>
