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
        <h2>Добавить новый ресурс</h2>
        <br>
        <form method="post" action="{{ route('resource.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Наименование</label>
                <input type="text" class="form-control" name="name"  value="{{ old('name') }}" id="name">
                @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="url">Адрес (URL)</label>
                <input type="text" class="form-control" name="url"  value="{{ old('url') }}" id="url">
                @error('url') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <br><button type="submit" class="btn btn-success">Сохранить</button>
        </form>

    </div>
@stop
@push('js')

    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function () {
            ClassicEditor
                .create( document.querySelector( '#description' ), {
                    height: 200
                })
                .catch( error => {
                    console.error( error );
                } );
        });
    </script>
@endpush
