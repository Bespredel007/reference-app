<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subscription extends Model
{
    protected $fillable = ['title', 'price', 'duration_days', 'description'];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'subscription_tag');
    }
}
