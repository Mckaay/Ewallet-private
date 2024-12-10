<?php

namespace App\Http\Resources\V1\Category;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/** @see \App\Models\Category */
class CategoryCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
        ];
    }
}
