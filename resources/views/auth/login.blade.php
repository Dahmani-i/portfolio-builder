@extends('layouts.app')

@section('content')

    <h2>Login</h2>

    @if($errors->any())
        @foreach($errors->all() as $error)
            <p style="color:red">{{ $error }}</p>
        @endforeach
    @endif

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <p><label>Email</label><br>
        <input type="email" name="email" value="{{ old('email') }}"></p><br>

        <p><label>Password</label><br>
        <input type="password" name="password"></p><br>

        <button type="submit">Login</button>
    </form>

    <br><p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>

@endsection