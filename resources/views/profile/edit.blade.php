@extends('layouts.app')

@section('content')

    <h2 style="margin-bottom: 20px;">Edit your profile</h2>

    @if(session('success'))
        <p style="color: green; margin-bottom: 15px;">{{ session('success') }}</p>
    @endif

    @if($errors->any())
        @foreach($errors->all() as $error)
            <p style="color: red; margin-bottom: 5px;">{{ $error }}</p>
        @endforeach
    @endif

    <div style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 1px 4px rgba(0,0,0,0.1);">

        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">

                <div>
                    <label style="display:block; margin-bottom: 5px; font-weight: bold;">Username</label>
                    <input type="text" name="username"
                           value="{{ old('username', $profile->username) }}"
                           style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                </div>

                <div>
                    <label style="display:block; margin-bottom: 5px; font-weight: bold;">Location</label>
                    <input type="text" name="location"
                           value="{{ old('location', $profile->location) }}"
                           style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                </div>

                <div>
                    <label style="display:block; margin-bottom: 5px; font-weight: bold;">GitHub URL</label>
                    <input type="text" name="github_url"
                           value="{{ old('github_url', $profile->github_url) }}"
                           style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                </div>

                <div>
                    <label style="display:block; margin-bottom: 5px; font-weight: bold;">LinkedIn URL</label>
                    <input type="text" name="linkedin_url"
                           value="{{ old('linkedin_url', $profile->linkedin_url) }}"
                           style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                </div>

            </div>

            <div style="margin-top: 16px;">
                <label style="display:block; margin-bottom: 5px; font-weight: bold;">Bio <span style="color:#888; font-weight:normal;">(max 500 characters)</span></label>
                <textarea name="bio" rows="3"
                          style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">{{ old('bio', $profile->bio) }}</textarea>
            </div>
            <div style="margin-top: 16px;">
                <label style="display:block; margin-bottom: 5px; font-weight: bold;">
                    Avatar <span style="color:#888; font-weight:normal;">(optional — jpg, png, webp — max 2MB)</span>
                </label>

                @if($profile->avatar)
                        <img src="{{ asset('storage/' . $profile->avatar) }}"
                            alt="avatar"
                            style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; margin-bottom: 10px; display: block;">
                @else
                <p style="color:#888; font-size:13px; margin-bottom:8px;">No avatar yet</p>
                @endif

                <input type="file" name="avatar" accept="image/*">
            </div>
            <div style="margin-top: 16px;">
                <button type="submit"
                        style="background: #2d2d2d; color: white; padding: 10px 24px; border: none; border-radius: 4px; cursor: pointer;">
                    Save profile
                </button>
            </div>

        </form>

    </div>

@endsection