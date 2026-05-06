<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }

    // ──────────────────────────────────────────
    // Relationships — Module 1
    // ──────────────────────────────────────────

    /**
     * Get the profile associated with the user.
     */
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    // ──────────────────────────────────────────
    // Relationships — Module 2 (Bakarid)
    // ──────────────────────────────────────────

    // public function projects(): HasMany
    // {
    //     return $this->hasMany(\App\Models\Project::class);
    // }

    // ──────────────────────────────────────────
    // Relationships — Module 3 (Bougra)
    // ──────────────────────────────────────────

    // public function skills(): HasMany
    // {
    //     return $this->hasMany(\App\Models\Skill::class);
    // }

    // public function certifications(): HasMany
    // {
    //     return $this->hasMany(\App\Models\Certification::class);
    // }
}