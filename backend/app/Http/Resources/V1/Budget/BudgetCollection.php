<?php

namespace App\Http\Resources\V1\Budget;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/** @see \App\Models\Budget */
class BudgetCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => BudgetResource::collection($this->collection),
        ];
    }
}
