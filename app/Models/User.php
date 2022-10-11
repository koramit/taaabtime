<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function socialProfiles(): HasMany
    {
        return $this->hasMany(SocialProfile::class);
    }

    public function chatBots(): BelongsToMany
    {
        return $this->belongsToMany(ChatBot::class)->withTimestamps();
    }

    public function activeLINEProfile(): HasOne
    {
        /** @TODO make provider id dynamic */
        return $this->hasOne(SocialProfile::class)->ofMany([
            'updated_at' => 'max',
        ], function ($query) {
            $query->where('social_provider_id', 1)
                ->where('active', true);
        });
    }

    public function scopeWithActiveChatBots($query)
    {
        $query->with(['chatBots' => function ($q) {
            $q->wherePivot('active', true);
        }]);
    }
}
