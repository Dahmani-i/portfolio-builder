<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $profile->username }} - Portfolio</title>
</head>
<body>

    <h2>{{ $user->name }}</h2>
    <p><strong>Username:</strong> {{ $profile->username }}</p>

    @if($profile->bio)
        <p><strong>Bio:</strong> {{ $profile->bio }}</p>
    @endif

    @if($profile->location)
        <p><strong>Location:</strong> {{ $profile->location }}</p>
    @endif

    @if($profile->github_url)
        <p><strong>GitHub:</strong> <a href="{{ $profile->github_url }}">{{ $profile->github_url }}</a></p>
    @endif

    @if($profile->linkedin_url)
        <p><strong>LinkedIn:</strong> <a href="{{ $profile->linkedin_url }}">{{ $profile->linkedin_url }}</a></p>
    @endif

    @auth
    @if(Auth::user()->profile && Auth::user()->profile->username === $profile->username)
            <a href="{{ route('profile.edit') }}">Edit my profile</a>
        @endif
    @endauth

</body>
</html>