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

        // Customer identity
        'full_name',
        'father_name',
        'national_code',
        'birth_certificate_number',
        'birth_date',

        // Contact
        'mobile',
        'landline',

        // Address
        'province',
        'city',
        'address',
        'postal_code',

        // Price snapshot
        'tariff_price',
        'modem_price',
        'total_price',

        // Request status
        'status',

        // Notes
        'admin_note',
        'customer_note',

        // Dates
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