@extends('layouts.admin')
@section('title')
    Редактирование ресурса - @parent
@stop
@section('content')
    <div>
        <br>
        <h2>Редактировать запись</h2>
        <br>
        <form method="post" action="{{ route('resource.update', ['resource' => $resource]) }}">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="name">Наименование</label>
                <input type="text" class="form-control" name="name"  value="{{ $resource->name }}" id="name">
            </div>

            <div class="form-group">
                <label for="url">Текст</label>
                <input type="text" class="form-control" name="url"  value="{{ $resource->url }}" id="url">
            </div>

            <br><button type="submit" class="btn btn-success">Сохранить</button>
        </form>

    </div>
@stop
@push('js')

@endpush
