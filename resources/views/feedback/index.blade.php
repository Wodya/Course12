@extends('layouts.admin')
@section('title')
    Список новостей - @parent
@stop
@section('content')
    <div>
        <h2>Список обращений</h2>
        <br>
        @if(session()->has('success'))
            <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif
        <a href="{{ route('feedback.create') }}">Добавить обращение</a>
        <br><br>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Категория</th>
                <th>Имя клиента</th>
                <th>email</th>
                <th>Тема</th>
                <th>Обращение</th>
                <th>Дата создания</th>            </tr>
            </thead>
            <tbody>
            @forelse($feedbackList as $feedback)
                <tr>
                    <td>{{ $feedback->id }}</td>
                    <td>{{ $feedback->feedback_category->name }}</td>
                    <td>{{ $feedback->client_name }}</td>
                    <td>{{ $feedback->email }}</td>
                    <td>{{ $feedback->subject }}</td>
                    <td>{{ $feedback->body }}</td>
                    <td>{{ $feedback->updated_at->format('d-m-Y H:i:s') }} </td>
                    <td><a href="{{ route('feedback.edit', ['feedback' => $feedback]) }}" >Ред.</a>
                        &nbsp;
                        <form method="post" action="{{ route('feedback.destroy', ['feedback' => $feedback]) }}">
                            @method('delete')
                            @csrf
                            <br><button type="submit" class="btn btn-success">Удалить</button>
                        </form>
                </tr>
            @empty
                <h2>Обращений нет</h2>
            @endforelse
            </tbody>
        </table>
        {{ $feedbackList->links() }}
    </div>
@stop
