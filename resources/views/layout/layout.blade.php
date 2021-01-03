@include('layout.css')
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Сайт Laravel - @yield('title')</title>
</head>
<body>
<div class="bd-main">
    <div class="bd-main-container container">
        <x-header></x-header>
        <div class="columns">
            <div class="column is-one-quarter">
                <x-menu></x-menu>
            </div>
            <div class="column">
                @section('content')
                @show
            </div>
        </div>
    </div>
</div>
</body>
</html>
