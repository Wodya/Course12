@extends('layouts.admin')
@section('title')
    Список новостей - @parent
@stop
@section('content')
    <div>
        <br>
        <h2>Редактировать запись</h2>
        <br>
        <form method="post" action="{{ route('feedback.update', ['feedback' => $feedback->id]) }}">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="category_id">Категория</label>
                <select class="form-control" name="feedback_category_id" id="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if($category->id == $feedback->feedback_category_id) selected @endif>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="email">Ваш email</label>
                <input type="email" name="email" class="form-control" value="{{$feedback->email}}" id="email" required>
            </div>
            <div class="form-group">
                <label for="client_name">Ваше имя</label>
                <input type="text" name="client_name" class="form-control" value="{{$feedback->client_name}}" id="client_name" required>
            </div>
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" name="subject"  value="{{ $feedback->subject }}" id="title" required>
            </div>
            <div class="form-group">
                <label for="body">Текст</label>
                <textarea class="form-control" name="body" id="body" required>{!! $feedback->body !!}</textarea>
            </div>

            <br><button type="submit" class="btn btn-success">Сохранить</button>
        </form>

    </div>
@stop
