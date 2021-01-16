<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @section('title') Админка @show</title>
    @include('admin.inc.css')
</head>
<body>

<x-top-nav></x-top-nav>
<div class="container-fluid">
    <div class="row">
        <x-sidebar></x-sidebar>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
           @yield('content')
        </main>
    </div>
</div>

@include('admin.inc.js')
</body>
</html>
