<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Show the registration form.
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Handle user registration.
     * Creates a user account and auto-generates a profile.
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'     => ['required', 'string', 'min:2', 'max:100'],
            'email'    => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'max:255', 'confirmed'],
            'username' => ['nullable', 'string', 'min:3', 'max:50', 'alpha_dash',
                           'unique:profiles,username'],
        ]);

        // Create the user account
        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Use provided username or auto-generate from name
        $username = !empty($validated['username'])
            ? $validated['username']
            : Profile::generateUsername($validated['name']);

        // Create the profile
        $user->profile()->create([
            'username' => $username,
        ]);

        // Log the user in
        Auth::login($user);

        return redirect('/portfolio/' . $username)
               ->with('success', 'Account created! Complete your profile.');
    }

    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle user login.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Redirect to portfolio if profile exists
            if ($user->profile) {
                return redirect('/portfolio/' . $user->profile->username);
            }

            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
    }

    /**
     * Handle user logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}