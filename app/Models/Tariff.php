<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tariff extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'speed_mbps',
        'price',
        'duration_days',
        'description',
        'features',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'speed_mbps' => 'integer',
        'price' => 'integer',
        'duration_days' => 'integer',
        'features' => 'array',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function fiberRequests(): HasMany
    {
        return $this->hasMany(FiberRequest::class);
    }

    public function scopeActive($query)
    {
        return $query
            ->where('is_active', true)
            ->orderBy('sort_order');
    }
}
