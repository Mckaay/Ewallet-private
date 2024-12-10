<?php

namespace App\Http\Resources\V1\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Category */
class CategoryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
        ];
    }
}
