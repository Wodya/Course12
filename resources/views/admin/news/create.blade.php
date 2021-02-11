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
        <form method="post" action="{{ route('news.store') }}" enctype="multipart/form-data">
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
                <label for="image">Изображение</label>
                <input type="file" class="form-control" name="image"  value="{{ old('image') }}" id="image">
                @error('image') <div class="alert alert-danger">{{ $message }}</div> @enderror
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
        <script src="{{ asset('resource/js/ckedit_include.js') }}" type="module" ></script>
{{--    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>--}}
    <script type="module">
        import ClassicEditor from '@ckeditor/ckeditor5-editor-classic/src/classiceditor';
        import Essentials from '@ckeditor/ckeditor5-essentials/src/essentials';
        import Paragraph from '@ckeditor/ckeditor5-paragraph/src/paragraph';
        import Bold from '@ckeditor/ckeditor5-basic-styles/src/bold';
        import Italic from '@ckeditor/ckeditor5-basic-styles/src/italic';
    </script>
    <script type="text/javascript">

        // document.addEventListener("DOMContentLoaded", function () {
        //     ClassicEditor
        //         .create( document.querySelector( '#description' ), {
        //             height: 200
        //         })
        //         .catch( error => {
        //             console.error( error );
        //         } );
        // });
        ClassicEditor
            .create( document.querySelector( '#description' ), {
                plugins: [ Essentials, Paragraph, Bold, Italic ],
                toolbar: [ 'bold', 'italic' ]
            } )
            .then( editor => {
                console.log( 'Editor was initialized', editor );
            } )
            .catch( error => {
                console.error( error.stack );
            } );

    </script>
@endpush
