<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{ mix('/js/app.js') }}"></script>
        <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css') }}">

        <title>Laravel Training</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="/">Laravel Training</a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/foo">Foo</a>
                </li>
            </ul>
        </nav>

        <main class="container">
            <h1>Hello World</h1>
        </main>
    </body>
</html>
