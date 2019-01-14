<!doctype html>
<html>
    <head>
       <title>@yield('title', 'Laracasts')</title>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css">
        <style>
            .is-complete {
                text-decoration: line-through;
            }
        </style>
    </head>
    <body style="padding-top: 40px;">
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
