@extends('layout.layout')
@section('title','Список категорий')
@section('content')
    <p class="is-size-3">
        Категории новостей:
    </p>
    <ul>
        @forelse($categories as $category)
            <li>
                <a href="{{route('news.category',[$category['id']])}}">{{$category['name']}}</a>
            </li>
        @empty
            <p>Категории отсутствуют</p>
        @endforelse
    </ul>
@stop
