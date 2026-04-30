<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display the public portfolio page.
     */
    public function show(string $username)
    {
        // Find the profile or return 404
        $profile = Profile::where('username', $username)
                          ->firstOrFail();

        $user = $profile->user;

        return view('portfolio.show', compact('profile', 'user'));
    }
}