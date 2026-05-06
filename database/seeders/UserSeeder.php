<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // User 1
        $user1 = User::create([
            'name'     => 'Alice Martin',
            'email'    => 'alice@example.com',
            'password' => Hash::make('password123'),
        ]);
        $user1->profile()->create([
            'username'     => 'alice-martin',
            'bio'          => 'Full stack developer passionate about Laravel and Vue.js.',
            'location'     => 'Paris, France',
            'github_url'   => 'https://github.com/alice',
            'linkedin_url' => 'https://linkedin.com/in/alice',
        ]);

        // User 2
        $user2 = User::create([
            'name'     => 'Bob Smith',
            'email'    => 'bob@example.com',
            'password' => Hash::make('password123'),
        ]);
        $user2->profile()->create([
            'username'     => 'bob-smith',
            'bio'          => 'Backend developer specializing in APIs and databases.',
            'location'     => 'London, UK',
            'github_url'   => 'https://github.com/bob',
            'linkedin_url' => 'https://linkedin.com/in/bob',
        ]);

        // User 3
        $user3 = User::create([
            'name'     => 'Sara Hassan',
            'email'    => 'sara@example.com',
            'password' => Hash::make('password123'),
        ]);
        $user3->profile()->create([
            'username'     => 'sara-hassan',
            'bio'          => 'Frontend developer who loves clean UI and user experience.',
            'location'     => 'Casablanca, Morocco',
            'github_url'   => 'https://github.com/sara',
            'linkedin_url' => 'https://linkedin.com/in/sara',
        ]);
    }
}