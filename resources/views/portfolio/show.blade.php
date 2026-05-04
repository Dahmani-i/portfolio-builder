@extends('layouts.app')

@section('content')

    {{-- Profile header card --}}
    <div style="background: white; border-radius: 8px; box-shadow: 0 1px 4px rgba(0,0,0,0.1); padding: 30px; display: flex; align-items: center; gap: 24px;">

        {{-- Avatar --}}
        @if($profile->avatar)
            <img src="{{ asset('storage/' . $profile->avatar) }}"
                 alt="avatar"
                 style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover; flex-shrink: 0;">
        @else
            <div style="width: 100px; height: 100px; border-radius: 50%; background: #2d2d2d; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                <span style="color: white; font-size: 36px; font-weight: bold;">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </span>
            </div>
        @endif

        {{-- Info --}}
        <div>
            <h2 style="margin-bottom: 4px;">{{ $user->name }}</h2>
            <p style="color: #888; margin-bottom: 8px;">{{ $profile->username }}</p>

            @if($profile->bio)
                <p style="margin-bottom: 8px;">{{ $profile->bio }}</p>
            @endif

            @if($profile->location)
                <p style="color: #888; font-size: 14px;">📍 {{ $profile->location }}</p>
            @endif
        </div>

    </div>

    {{-- Social links --}}
    @if($profile->github_url || $profile->linkedin_url)
        <div style="margin-top: 20px; background: white; border-radius: 8px; box-shadow: 0 1px 4px rgba(0,0,0,0.1); padding: 20px;">
            <h3 style="margin-bottom: 12px;">Connect</h3>
            <div style="display: flex; gap: 10px;">
                @if($profile->github_url)
                    <a href="{{ $profile->github_url }}" target="_blank"
                       style="background: #2d2d2d; color: white; padding: 8px 16px; border-radius: 4px; text-decoration: none; font-size: 14px;">
                        GitHub
                    </a>
                @endif
                @if($profile->linkedin_url)
                    <a href="{{ $profile->linkedin_url }}" target="_blank"
                       style="background: #0077b5; color: white; padding: 8px 16px; border-radius: 4px; text-decoration: none; font-size: 14px;">
                        LinkedIn
                    </a>
                @endif
            </div>
        </div>
    @endif

    {{-- Placeholder for M2 and M3 --}}
    <div style="margin-top: 20px; background: white; border-radius: 8px; box-shadow: 0 1px 4px rgba(0,0,0,0.1); padding: 20px; color: #aaa; text-align: center;">
        Projects, skills and certifications coming soon...
    </div>

@endsection