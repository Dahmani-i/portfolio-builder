<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Builder</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f5f5f5; }

        nav {
            background: #2d2d2d;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        nav .brand {
            color: white;
            font-size: 20px;
            font-weight: bold;
            text-decoration: none;
        }
        nav .nav-links a, nav .nav-links button {
            color: white;
            text-decoration: none;
            margin-left: 15px;
            background: none;
            border: 1px solid white;
            padding: 6px 14px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
        nav .nav-links a:hover, nav .nav-links button:hover {
            background: white;
            color: #2d2d2d;
        }

        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
        }

        footer {
            text-align: center;
            padding: 20px;
            margin-top: 60px;
            color: #888;
            font-size: 13px;
            border-top: 1px solid #ddd;
        }
    </style>
</head>
<body>

    {{-- Navbar --}}
    <nav>
        <a href="/" class="brand">Portfolio Builder</a>
        <div class="nav-links">
            @auth
                <a href="/portfolio/{{ Auth::user()->profile?->username }}">My Portfolio</a>
                <a href="{{ route('profile.edit') }}">Edit Profile</a>
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    </nav>

    {{-- Page content --}}
    <div class="container">
        @yield('content')
    </div>

    {{-- Footer --}}
    <footer>
        <p>Portfolio Builder &copy; {{ date('Y') }}</p>
    </footer>

</body>
</html>