<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Show the profile edit form.
     */
    public function edit()
    {
        $profile = Auth::user()->profile;

        // Safety check — redirect if no profile found
        if (!$profile) {
            return redirect('/')->with('error', 'Profile not found.');
        }

        return view('profile.edit', compact('profile'));
    }

    /**
     * Update the authenticated user's profile.
     */
    public function update(Request $request)
    {
        $profile = Auth::user()->profile;

        // 1. Validate input
        $validated = $request->validate([
            'username'     => ['required', 'string', 'min:3', 'max:50', 'alpha_dash',
                               'unique:profiles,username,' . $profile->id],
            'bio'          => ['nullable', 'string', 'min:10', 'max:500'],
            'location'     => ['nullable', 'string', 'max:100'],
            'github_url'   => ['nullable', 'url', 'max:255', 'starts_with:https://github.com'],
            'linkedin_url' => ['nullable', 'url', 'max:255', 'starts_with:https://linkedin.com'],
            'avatar'       => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        // 2. Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($profile->avatar) {
                Storage::disk('public')->delete($profile->avatar);
            }
            // Store new avatar
            $validated['avatar'] = $request->file('avatar')
                                            ->store('avatars', 'public');
        }

        // 3. Update the profile
        $profile->update($validated);

        // 4. Redirect to public portfolio
        return redirect('/portfolio/' . $profile->username)
               ->with('success', 'Profile updated successfully!');
    }
}