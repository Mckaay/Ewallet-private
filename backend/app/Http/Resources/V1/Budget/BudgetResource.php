<?php

declare(strict_types=1);

namespace App\Http\Resources\V1\Budget;

use App\Http\Resources\V1\Category\CategoryResource;
use App\Http\Resources\V1\Theme\ThemeResource;
use App\Models\Budget;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Budget */
final class BudgetResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'limit' => $this->limit,
            'category' => $this->whenLoaded('category', fn() => new CategoryResource($this->category)),
            'theme' => $this->whenLoaded('theme', fn() => new ThemeResource($this->theme)),
        ];
    }
}
