@extends('layout.layout')
@section('content')
    <h3>
        <p class="is-size-3">
            @if(isset($category))
                Категория {{$category['name']}}
                @section('title',$category['name'])
            @else
                Категория не найдена
            @endif
        </p>
    </h3>
    <ul>
        @foreach($news as $new)
            <li>
                <a href="{{route('news.category.info',[$new['id']])}}">{{$new['text']}}</a>
            </li>
        @endforeach
    </ul>
@stop
