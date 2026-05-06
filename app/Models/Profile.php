<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Profile extends Model
{
    use HasFactory;

    /**
     * Fields that can be mass assigned.
     */
    protected $fillable = [
        'user_id',
        'username',
        'bio',
        'avatar',
        'location',
        'github_url',
        'linkedin_url',
    ];

    // ──────────────────────────────────────────
    // Relationships
    // ──────────────────────────────────────────

    /**
     * Profile belongs to a User.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // ──────────────────────────────────────────
    // Helper methods
    // ──────────────────────────────────────────

    /**
     * Generate a unique username from a display name.
     * Example: "John Doe" → "john-doe"
     * If taken → "john-doe-1", "john-doe-2", etc.
     */
    public static function generateUsername(string $name): string
    {
        $base     = Str::slug($name);
        $username = $base;
        $counter  = 1;

        while (static::where('username', $username)->exists()) {
            $username = "{$base}-{$counter}";
            $counter++;
        }

        return $username;
    }
}