<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}" />
        <link href="{{mix('css/app.css')}}" rel="stylesheet" />
        <title>Tâchons</title>
    </head>
    <body class="antialiased">
        <div id="app">
            <div class="relative flex items-top justify-center min-h-screen sm:items-center py-4 sm:pt-0 text-white">
                <app-container />
            </div>
        </div>

        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>