<?php

declare(strict_types=1);

namespace App\Http\Resources\V1\Budget;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/** @see \App\Models\Budget */
final class BudgetCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => BudgetResource::collection($this->collection),
        ];
    }
}
