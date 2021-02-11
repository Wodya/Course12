@extends('layouts.admin')
@section('title')
    Список новостей - @parent
@stop
@section('content')
    <div>
        <h2>Список ресурсов</h2>
        <br>
        @if(session()->has('success'))
            <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif
        <a href="{{ route('resource.create') }}">Добавить ресурс</a>
        &nbsp;
        <a href="{{ route('update_news') }}">Обновить новости</a>
        <br><br>
     <table class="table table-bordered">
         <thead>
         <tr>
             <th>#ID</th>
             <th>Наименование</th>
             <th>URL</th>
             <th>Дата обновления</th>
         </tr>
         </thead>
         <tbody>
    @forelse($resources as $resource)
        <tr>
            <td>{{ $resource->id }}</td>
            <td>{{ $resource->name }}</td>
            <td>{{ $resource->url }}</td>
            <td>{{ $resource->updated_at->format('d-m-Y H:i:s') }} </td>
            <td>
                <a href="{{ route('resource.edit', ['resource' => $resource]) }}" >Ред.</a>
            &nbsp; <a href="javascript:;" class="deleteData" rel="{{ $resource->id }}">Удл.</a></td>
        </tr>
    @empty
        <h2>Новостей нет</h2>
    @endforelse
         </tbody>
     </table>
        {{ $resources->links() }}
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
                    fetchData("{{ url('/admin/resource') }}/" + this.getAttribute('rel'), {
                        method: "DELETE",
                        headers: {
                            'Content-Type': 'application/json; charset=utf-8',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }).then((data) => {
                        console.log('Deleted');
                        window.location.href = "{{url('/admin/resource')}}";
                    })
                }
            });
            });
        });
    </script>
@endpush
