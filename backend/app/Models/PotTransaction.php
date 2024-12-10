<?php

namespace App\Models;

use App\Enums\PotTransactionType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PotTransaction extends Model
{
    protected $casts =  [
        'type' => PotTransactionType::class,
    ];

    public function pot(): BelongsTo
    {
        return $this->belongsTo(Pot::class);
    }
}
