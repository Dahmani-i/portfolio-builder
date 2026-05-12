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
                <a href="{{ route('register') }}" style="
                    display: inline-block;
                    padding: 12px 28px;
                    background-color: #2d2d2d;
                    color: white;
                    text-decoration: none;
                    border-radius: 6px;
                    font-size: 16px;
                    font-weight: bold;
                ">Get started</a>
            </div>
        @endauth

    </div>

@endsection