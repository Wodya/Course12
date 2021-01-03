@extends('layout.layout')
@section('content')
    @if(isset($new))
        <p class="is-size-3">Новость {{$new['text']}}</p>
        <p>{{$new['info']}}</p>
        @section('title',$new['text'])
    @else
        <p class="is-size-3">Новость не найдена</p>
    @endif
@stop
