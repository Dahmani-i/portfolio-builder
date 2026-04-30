<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
</head>
<body>

    <h2>Edit your profile</h2>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li style="color:red">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PUT')

        <label>Username</label><br>
        <input type="text" name="username" value="{{ old('username', $profile->username) }}"><br><br>

        <label>Bio</label><br>
        <textarea name="bio" rows="4">{{ old('bio', $profile->bio) }}</textarea><br><br>

        <label>Location</label><br>
        <input type="text" name="location" value="{{ old('location', $profile->location) }}"><br><br>

        <label>GitHub URL</label><br>
        <input type="text" name="github_url" value="{{ old('github_url', $profile->github_url) }}"><br><br>

        <label>LinkedIn URL</label><br>
        <input type="text" name="linkedin_url" value="{{ old('linkedin_url', $profile->linkedin_url) }}"><br><br>

      <button type="submit">Save profile</button>
    </form>

<a href="/portfolio/{{ $profile->username }}">
    <button type="button">View my portfolio</button>
</a>
    <form method="POST" action="{{ route('logout') }}">
    @csrf
        <button type="submit">Logout</button>
    </form>

</body>
</html>