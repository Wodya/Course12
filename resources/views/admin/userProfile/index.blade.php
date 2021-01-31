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
        <br><br>
     <table class="table table-bordered">
         <thead>
         <tr>
             <th>#ID</th>
             <th>Имя пользователь</th>
             <th>Администратор</th>
             <th>Управление</th>
         </tr>
         </thead>
         <tbody>
    @forelse($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td><input type="checkbox" {{ $user->is_admin?"checked":"" }} disabled="disabled" ></td>
            <td><a href="{{ route('userProfile.edit', ['userProfile' => $user]) }}" >Ред.</a></td>
        </tr>
    @empty
        <h2>Новостей нет</h2>
    @endforelse
         </tbody>
     </table>
        {{ $users->links() }}
    </div>
@stop
