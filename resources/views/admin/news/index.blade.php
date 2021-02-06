@extends('layouts.admin')
@section('title')
    Список новостей - @parent
@stop
@section('content')
    <div>
        <h2>Список новостей</h2>
        <br>
        @if(session()->has('success'))
            <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif
        <a href="{{ route('news.create') }}">Добавить новость</a>
        &nbsp;
        <a href="{{ route('update_news') }}">Обновить новости из Rss</a>
        <br><br>
     <table class="table table-bordered">
         <thead>
         <tr>
             <th>#ID</th>
             <th>Категория</th>
             <th>Новость</th>
             <th>Дата обновления</th>
             <th>Управление</th>
         </tr>
         </thead>
         <tbody>
    @forelse($newsList as $news)
        <tr>
            <td>{{ $news->id }}</td>
            <td>{{ $news->category->title }}</td>
            <td>{{ $news->title }}</td>
            <td>{{ $news->updated_at->format('d-m-Y H:i:s') }} </td>
            <td><a href="{{ route('news.edit', ['news' => $news]) }}" >Ред.</a>
            &nbsp; <a href="javascript:;" class="deleteData" rel="{{ $news->id }}">Удл.</a></td>
        </tr>
    @empty
        <h2>Новостей нет</h2>
    @endforelse
         </tbody>
     </table>
        {{ $newsList->links() }}
    </div>
@stop
@push('js')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            const fetchData = async (url, options) => {
                const response = await fetch(`${url}`, options);
                const body = await response.json();
                return body;
            }
            const buttons = document.querySelectorAll(".deleteData");

            buttons.forEach(function (index) {
            index.addEventListener("click", function () {
                if(confirm("Вы подтверждаете удаление ?")) {
                    fetchData("{{ url('/admin/news') }}/" + this.getAttribute('rel'), {
                        method: "DELETE",
                        headers: {
                            'Content-Type': 'application/json; charset=utf-8',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }).then((data) => {
                        console.log('Deleted');
                    })
                }
            });
            });
        });
    </script>
@endpush
