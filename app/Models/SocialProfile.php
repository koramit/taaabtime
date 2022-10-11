<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsEncryptedArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SocialProfile extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = ['profile' => AsEncryptedArrayObject::class];

    public function socialProvider(): BelongsTo
    {
        return $this->belongsTo(SocialProvider::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeActiveLoginByProviderId($query, $providerId)
    {
        return $query->where('social_provider_id', $providerId)->where('active', true);
    }
}
