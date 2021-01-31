@extends('layouts.admin')
@section('title')
    Список новостей - @parent
@stop
@section('content')
    <div>
        <br>
        <h2>Редактировать запись</h2>
        <br>
        <form method="post" action="{{ route('userProfile.update', ['userProfile' => $user->id]) }}">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="title">Имя пользователя</label>
                <input type="text" class="form-control" name="name"  value="{{ $user->name }}" id="name">
                @error('name') <div class="alert alert-danger">{{$message}}</div> @enderror
            </div>

            <div class="form-group mt-2">
                <input type="checkbox" class="form-check-input" name="is_admin" {{ $user->is_admin?"checked":""}} id="is_admin">
                <label for="description" class="form-check-label">Администратор</label>
            </div>

            <br><button type="submit" class="btn btn-success">Сохранить</button>
        </form>

    </div>
@stop

