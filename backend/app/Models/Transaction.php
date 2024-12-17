<?php

declare(strict_types=1);

namespace App\Models;

use App\Scopes\UserScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ScopedBy([UserScope::class])]
final class Transaction extends Model
{
    use HasFactory;

    protected $visible = [
        'id',
        'amount',
        'category_id',
        'name',
        'date',
    ];

    public function casts(): array
    {
        return [
            //            'recurring' => 'boolean',
            'date' => 'datetime:Y-m-d',
            'amount' => 'float',
        ];
    }

    public function getAmountWithPrefixAttribute(): string
    {
        if ($this->amount < 0) {
            $prefix = '-$';
        } else {
            $prefix = '$';
        }

        return $prefix . $this->amount;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
