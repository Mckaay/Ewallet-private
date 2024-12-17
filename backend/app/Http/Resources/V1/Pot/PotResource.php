<?php

declare(strict_types=1);

namespace App\Http\Resources\V1\Pot;

use App\Http\Resources\V1\Theme\ThemeResource;
use App\Models\Pot;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Pot */
final class PotResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'target' => $this->target,
            'theme' => $this->whenLoaded('theme', fn() => new ThemeResource($this->theme)),
        ];
    }
}
