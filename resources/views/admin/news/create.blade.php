@extends('layouts.admin')
@section('title')
    Список новостей - @parent
@stop
@section('content')
    <div><br>
        @if($errors->any())
            <div class="alert alert-danger">
             <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
             </ul>
            </div>
        @endif
        <h2>Добавить новую запись</h2>
        <br>
        <form method="post" action="{{ route('news.store') }}">
            @csrf
            <div class="form-group">
                <label for="category_id">Категория</label>
                <select class="form-control" name="category_id" id="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" name="title"  value="{{ old('title') }}" id="title">
                @error('title') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="description">Текст</label>
                <textarea class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
                @error('description') <div class="alert alert-danger">{{ $message }}</div> @enderror
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