<?php

declare(strict_types=1);

namespace App\Http\Resources\V1\Transaction;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/** @see \App\Models\Transaction */
final class TransactionCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'status' => 'success',
            'data' => TransactionResource::collection($this->collection),
        ];
    }
}
