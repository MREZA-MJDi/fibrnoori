<?php

namespace App\Events;

use App\Models\FiberRequest;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FiberRequestCreated
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public FiberRequest $fiberRequest
    ) {
    }
}
