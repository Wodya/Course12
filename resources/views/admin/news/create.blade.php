@extends('layouts.admin')
@section('title')
    Список новостей - @parent
@stop
@section('content')
    <div>
        <h2>Добавить новую запись</h2>
        <br>
        <form method="post" action="{{ route('news.store') }}">
            @csrf
            <div class="form-group">
                <label for="category_id">Категория</label>
                <select class="form-control" name="category_id" id="category_id">
                    <option value="1">Категория 1</option>
                    <option value="2">Категория 2</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" name="title"  value="{{ old('title') }}" id="title">
            </div>

            <div class="form-group">
                <label for="description">Текст</label>
                <textarea class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
            </div>

            <br><button type="submit" class="btn btn-success">Сохранить</button>
        </form>

    </div>
@stop
@push('js')
    <script type="text/javascript">
        // alert("Hello world");
    </script>
@endpush