@extends('layout')

@section('title', $todo->name)

@section('content')
<h1>{{ $todo->name }}</h1>
<p>{{ $todo->description }}</p>
<a href="/todo" class="btn btn-primary stretched-link">Back to My Todos</a>
@endsection
