<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RequestStatusHistory extends Model
{
    protected $fillable = [
        'fiber_request_id',
        'changed_by',
        'from_status',
        'to_status',
        'note',
        'ip_address',
    ];

    public function fiberRequest(): BelongsTo
    {
        return $this->belongsTo(FiberRequest::class);
    }

    public function changedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'changed_by');
    }
}
