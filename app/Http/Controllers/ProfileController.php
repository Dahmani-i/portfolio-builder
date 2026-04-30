<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Show the profile edit form.
     */
    public function edit()
    {
        $profile = Auth::user()->profile;
        return view('profile.edit', compact('profile'));
    }

    /**
     * Update the profile.
     */
    public function update(Request $request)
    {
        $profile = Auth::user()->profile;

        // 1. Validate input
        $validated = $request->validate([
            'username'     => ['required', 'string', 'max:50', 'alpha_dash',
                               'unique:profiles,username,' . $profile->id],
            'bio'          => ['nullable', 'string', 'max:500'],
            'location'     => ['nullable', 'string', 'max:100'],
            'github_url'   => ['nullable', 'url', 'max:255'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
        ]);

        // 2. Update the profile
        $profile->update($validated);

        // 3. Redirect back with success
        return back()->with('success', 'Profile updated successfully!');
    }
}