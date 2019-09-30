@extends('layout')

@section('title', $todo->name)

@section('content')
<h1>{{ $todo->name }}</h1>
<form method="POST" action="{{ url('todo/' . $todo->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" value="{{ $todo->name }}">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description">{{ $todo->description }}</textarea>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
