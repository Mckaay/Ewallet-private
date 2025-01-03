<?php

declare(strict_types=1);

namespace App\Http\Resources\V1\Theme;

use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/** @see Theme */
final class ThemeCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => ThemeResource::collection($this->collection),
        ];
    }
}
