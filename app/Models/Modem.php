<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Modem extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'features',
        'image',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'price' => 'integer',
        'stock' => 'integer',
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

    public function hasStock(): bool
    {
        return $this->stock > 0;
    }
}
