@extends('layouts.auth.loginForm')

@section('content')
<form action="{{ route('login.submit') }}" method="POST">
    @csrf

    <div>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
    </div>

    <div>
        <button type="submit">Login</button>
    </div>
</form>
@endsection
