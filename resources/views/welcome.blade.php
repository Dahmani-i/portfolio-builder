@extends('layouts.app')

@section('content')

    <div style="text-align: center; margin-top: 60px;">

        <h1>Welcome to Portfolio Builder</h1>
        <p style="color: #888; margin-top: 10px;">Showcase your work to the world.</p>

        @auth
            <div style="margin-top: 30px;">
                <a href="/portfolio/{{ Auth::user()->profile?->username }}">
                    <button type="button">View my portfolio</button>
                </a>
            </div>
        @else
            <div style="margin-top: 30px;">
                <a href="{{ route('register') }}">
                    <button type="button">Get started</button>
                </a>
                &nbsp;&nbsp;
                <a href="{{ route('login') }}">
                    <button type="button">Login</button>
                </a>
            </div>
        @endauth

    </div>

@endsection