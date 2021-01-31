@extends('layouts.admin')
@section('title')
    Профиль - @parent
@stop
@section('content')
    <div>
        <h2>Привет {{$user->name}}</h2>
        <br>
        <a href="{{route('logout')}}">Выйти</a>
    </div>
@stop
@push('js')
    <script type="text/javascript">
        // alert("Hello world");
    </script>
@endpush
