@extends('layouts.admin')
@section('title')
    Список новостей - @parent
@stop
@section('content')
    <div>
        <h2>Список новостей</h2>
        <br>
        <a href="{{ route('news.create') }}">Добавить новость</a>
        <br>
    @forelse($news as $k => $n)
        @if ($loop->last)
            Последняя итерация
            @break
        @endif
        @isset($n['title'])
            {!! $n['title'] !!}  . "-" . {{ now()->format('i:s') }}<br>
        @endisset
    @empty
        <h2>Новостей нет</h2>
    @endforelse
    </div>
@stop
@push('js')
    <script type="text/javascript">
       // alert("Hello world");
    </script>
@endpush