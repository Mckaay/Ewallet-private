<?php

namespace App\Http\Resources\V1\Theme;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/** @see \App\Models\Theme */
class ThemeCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
        ];
    }
}
