@extends('layouts.admin')
@section('title')
    Список новостей - @parent
@stop
@section('content')
    <div>
        <br>
        <h2> Запись</h2>
        <br>
        <h3>Колл-во посещений: {{ $news->views }}</h3>
            <div class="form-group">
                <label for="title">Заголовок</label>
                {{ $news->title }}
            </div>

            <div class="form-group">
                <label for="description">Текст</label>
                {!! $news->description !!}
            </div>



    </div>
@stop
@push('js')
    <script type="text/javascript">
        // alert("Hello world");
    </script>
@endpush