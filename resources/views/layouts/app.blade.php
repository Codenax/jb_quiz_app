<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <style>
            .bg-image {
            background-image: url("/images/bg.jpg");
            background-size: cover;
            background-position: center;
            }
            .backdrop {
            backdrop-filter: blur(5px);
            }
            .text-shadow {
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
            }
        </style>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @livewireStyles

    </head>
    <body class="">
        <div class="min-h-screen bg-gray-900 " >
            @include('layouts.navigation')
            <main>
                {{ $slot }}
            </main>
        </div>
        @livewireScripts
         <!-- Scripts -->
         <script src="{{ asset('js/app.js') }}" defer></script>
         <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
         <script>
            feather.replace()
          </script>
    </body>
</html>
