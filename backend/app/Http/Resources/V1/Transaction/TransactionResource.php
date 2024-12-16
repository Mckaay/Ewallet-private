<?php

declare(strict_types=1);

namespace App\Http\Resources\V1\Transaction;

use App\Http\Resources\V1\Category\CategoryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin {Transaction} */
final class TransactionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'amount' => $this->amount_with_prefix,
            'category_id' => $this->whenLoaded('category', fn() => new CategoryResource($this->category)),
            'date' => $this->date,
            ];
    }
}
