@extends('layout')

@section('title', $todo->name)

@section('content')
<h1>{{ $todo->name }}</h1>
<p>{{ $todo->description }}</p>
<a href="{{ url("todo/{$todo->id}/edit") }}" class="btn btn-light">Edit</a>
<a href="{{ url('todo') }}" class="btn btn-primary">Back to My Todos</a>
@endsection
