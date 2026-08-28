<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FiberRequest extends Model
{
    protected $fillable = [
        'user_id',
        'tariff_id',
        'modem_id',
        'tracking_code',
        'full_name',
        'national_code',
        'mobile',
        'province',
        'city',
        'address',
        'postal_code',
        'tariff_price',
        'modem_price',
        'total_price',
        'status',
        'admin_note',
        'customer_note',
        'reviewed_at',
        'completed_at',
    ];

    protected $casts = [
        'tariff_price' => 'integer',
        'modem_price' => 'integer',
        'total_price' => 'integer',
        'reviewed_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tariff(): BelongsTo
    {
        return $this->belongsTo(Tariff::class);
    }

    public function modem(): BelongsTo
    {
        return $this->belongsTo(Modem::class);
    }

    public function statusHistories(): HasMany
    {
        return $this->hasMany(RequestStatusHistory::class);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    public function isCompleted(): bool
    {
        return $this->status === 'completed';
    }

    public function isRejected(): bool
    {
        return $this->status === 'rejected';
    }
}
