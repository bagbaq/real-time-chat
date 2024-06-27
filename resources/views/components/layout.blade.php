@props(['title' => 'Home'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME') }} - {{ $title }}</title>
    @vite('resources/css/app.css')
    @stack('styles')
</head>
<body>
    <div class="site-content">
        {{ $slot }}
    </div>

    <footer class="text-white bg-gray-500 flex flex-col pt-2 md:flex-row md:pt-0 items-center px-10">
        Copyright {{ date('Y') }}&reg - <span class="mx-1 font-bold">{{ env('APP_NAME') }}</span>
    </footer>

    @vite('resources/js/app.js')

    @stack('scripts')
</body>
</html>
