<?php

namespace App\Http\Resources\V1\Theme;

use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Theme */
class ThemeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'color' => $this->color,
        ];
    }
}
