@extends('layouts.admin')
@section('title')
    Обратная связь - @parent
@stop
@section('content')
    <div>
        <h2>Создайте обращение</h2>
        <br>
        <form method="post" action="{{ route('feedback.store') }}">
            @csrf
            <div class="form-group">
                <label for="category_id">Категория</label>
                <select class="form-control" name="category_id" id="category_id">
                    <option value="1">Категория 1</option>
                    <option value="2">Категория 2</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email">Ваш email</label>
                <input type="email" name="email" class="form-control" value="{{old('email')}}" id="email" required>
            </div>
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" name="title"  value="{{ old('title') }}" id="title" required>
            </div>

            <div class="form-group">
                <label for="description">Текст</label>
                <textarea class="form-control" name="description" id="description" required>{!! old('description') !!}</textarea>
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
