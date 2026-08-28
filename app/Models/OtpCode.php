<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtpCode extends Model
{
    protected $fillable = [
        'mobile',
        'code',
        'expires_at',
        'verified_at',
        'attempts',
        'request_ip',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'verified_at' => 'datetime',
        'attempts' => 'integer',
    ];

    public function isExpired(): bool
    {
        return now()->greaterThan($this->expires_at);
    }

    public function isVerified(): bool
    {
        return !is_null($this->verified_at);
    }

    public function isValid(): bool
    {
        return !$this->isExpired() && !$this->isVerified();
    }
}
