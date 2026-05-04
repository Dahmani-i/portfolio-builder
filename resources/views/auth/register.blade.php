@extends('layouts.app')

@section('content')

    <h2>Create your account</h2>

    @if($errors->any())
        @foreach($errors->all() as $error)
            <p style="color:red">{{ $error }}</p>
        @endforeach
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <p><label>Full name</label><br>
        <input type="text" name="name" value="{{ old('name') }}"></p><br>
        
        <p><label>Username <span style="color:#888; font-size:12px;">(optional — leave empty to auto-generate)</span></label><br>
        <input type="text" name="username" value="{{ old('username') }}" placeholder="e.g. john-doe"></p><br>
        
        <p><label>Email</label><br>
        <input type="email" name="email" value="{{ old('email') }}"></p><br>

        <p><label>Password</label><br>
        <input type="password" name="password"></p><br>

        <p><label>Confirm password</label><br>
        <input type="password" name="password_confirmation"></p><br>

        <button type="submit">Register</button>
    </form>

    <br><p>Already have an account? <a href="{{ route('login') }}">Login</a></p>

@endsection