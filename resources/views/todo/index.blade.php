@extends('layout')

@section('title', 'My Todos')

@section('content')
<h1>My Todos</h1>
<a class="btn btn-primary" href="todo/create" role="button">Create New Todo</a>
<ul class="list-group mt-3 mb-3">
@foreach ($todos as $todo)
    <a href="{{ url("todo/{$todo->id}") }}" class="list-group-item list-group-item-action">
        {{ $todo->name }}
    </a>
@endforeach
</ul>
{{ $todos->links() }}
@endsection
