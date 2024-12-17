<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\PotTransactionType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class PotTransaction extends Model
{
    protected $casts =  [
        'type' => PotTransactionType::class,
    ];

    public function pot(): BelongsTo
    {
        return $this->belongsTo(Pot::class);
    }
}
