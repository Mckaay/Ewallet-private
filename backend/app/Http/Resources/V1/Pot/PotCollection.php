<?php

declare(strict_types=1);

namespace App\Http\Resources\V1\Pot;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/** @see \App\Models\Pot */
final class PotCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => PotResource::collection($this->collection),
        ];
    }
}
