<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- csrf -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

    </head>
    <body>
        <div id="app">
            <router-view></router-view>  
        </div>
        
        <script src="{{ asset('js/app.js') }}"></script>
        <script>
        window.Laravel = <?php 
            echo json_encode([
                'csrfToken' => csrf_token(),
            ]); 
        ?>
        </script>
    </body>
</html>
