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
                @error('feedback_category_id') <div class="alert alert-danger">{{$message}}</div> @enderror
            </div>
            <div class="form-group">
                <label for="email">Ваш email</label>
                <input type="text" name="email" class="form-control" value="{{$feedback->email}}" id="email" >
                @error('email') <div class="alert alert-danger">{{$message}}</div> @enderror
            </div>
            <div class="form-group">
                <label for="client_name">Ваше имя</label>
                <input type="text" name="client_name" class="form-control" value="{{$feedback->client_name}}" id="client_name" >
                @error('client_name') <div class="alert alert-danger">{{$message}}</div> @enderror
            </div>
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" name="subject"  value="{{ $feedback->subject }}" id="title" >
                @error('subject') <div class="alert alert-danger">{{$message}}</div> @enderror
            </div>
            <div class="form-group">
                <label for="body">Текст</label>
                <textarea class="form-control" name="body" id="body" >{!! $feedback->body !!}</textarea>
                @error('body') <div class="alert alert-danger">{{$message}}</div> @enderror
            </div>

            <br><button type="submit" class="btn btn-success" name="save">Сохранить</button>
        </form>

    </div>
@stop
