@extends('layout')

@section('title', 'My Todos')

@section('content')
<h1>My Todos</h1>
<ul class="list-group">
@foreach ($todos as $todo)
    <li class="list-group-item">{{ $todo->name }}</li>
@endforeach
</ul>
@endsection
