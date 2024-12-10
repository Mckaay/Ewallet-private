<?php

namespace App\Http\Resources\V1\Budget;

use App\Http\Resources\V1\Category\CategoryResource;
use App\Http\Resources\V1\Theme\ThemeResource;
use App\Models\Budget;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Budget */
class BudgetResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'limit' => $this->limit,
            'category' => $this->whenLoaded('category', function () {
                return new CategoryResource($this->category);
            }),
            'theme' => $this->whenLoaded('theme', function () {
                return new ThemeResource($this->theme);
            }),
        ];
    }
}
