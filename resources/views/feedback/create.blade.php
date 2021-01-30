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
                <select class="form-control" name="feedback_category_id" id="feedback_category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('feedback_category_id') <div class="alert alert-danger">{{$message}}</div> @enderror
            </div>
            <div class="form-group">
                <label for="email">Ваш email</label>
                <input type="email" name="email" class="form-control" value="{{old('email')}}" id="email">
                @error('email') <div class="alert alert-danger">{{$message}}</div> @enderror
            </div>
            <div class="form-group">
                <label for="client_name">Ваше имя</label>
                <input type="text" name="client_name" class="form-control" value="{{old('client_name')}}" id="client_name">
                @error('client_name') <div class="alert alert-danger">{{$message}}</div> @enderror
            </div>
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" name="subject"  value="{{ old('subject') }}" id="title">
                @error('subject') <div class="alert alert-danger">{{$message}}</div> @enderror
            </div>

            <div class="form-group">
                <label for="body">Текст</label>
                <textarea class="form-control" name="body" id="body">{!! old('body') !!}</textarea>
                @error('body') <div class="alert alert-danger">{{$message}}</div> @enderror
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
