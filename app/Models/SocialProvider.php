<?php

namespace App\Models;

use App\Traits\PKHashable;
use Illuminate\Database\Eloquent\Casts\AsEncryptedArrayObject;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SocialProvider extends Model
{
    use HasFactory, PKHashable;

    protected $guarded = [];

    protected $casts = ['configs' => AsEncryptedArrayObject::class];

    protected array $platforms = ['', 'line', 'telegram'];

    public function users(): HasMany
    {
        return $this->hasMany(SocialProfile::class, 'social_provider_id', 'id');
    }

    public function chatBots(): HasMany
    {
        return $this->hasMany(ChatBot::class);
    }

    protected function platform(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->platforms[$this->attributes['platform']],
            set: fn ($value) => array_search($value, $this->platforms),
        );
    }
}
