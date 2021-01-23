@extends('layouts.admin')
@section('title')
    Список новостей - @parent
@stop
@section('content')
    <div>
        <h2>Список источников новостей</h2>
        <br>
        @forelse($newsSourceList as $source)
            {{$source->id}} ; {{$source->name}} ; {{$source->url}} <BR>
        @empty
            <h2>Источников нет</h2>
        @endforelse
    </div>
@stop
