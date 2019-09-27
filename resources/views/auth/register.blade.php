@extends('layout')

@section('title', 'Register')

@section('content')
<h1>Register</h1>
<form method="POST" action="register">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    <div class="form-group">
        <label for="password">Password (confirmation)</label>
        <input type="password" class="form-control" name="password_confirmation">
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
