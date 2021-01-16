@extends('layouts.admin')
@section('title')
    Обратная связь. Результат - @parent
@stop
@section('content')
    @if($status == 1)
    <div class="alert alert-primary" role="alert">
        Обращение создано
    </div>
    @endif
@stop
