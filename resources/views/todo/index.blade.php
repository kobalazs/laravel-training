@extends('layout')

@section('title', 'My Todos')

@section('content')
<h1>My Todos</h1>
<ul class="list-group mb-3">
@foreach ($todos as $todo)
    <a href="todo/{{ $todo->id }}" class="list-group-item list-group-item-action">
        {{ $todo->name }}
    </a>
@endforeach
</ul>
{{ $todos->links() }}
@endsection
