<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Theme\ThemeCollection;
use App\Models\Theme;

final class ThemeController extends Controller
{
    public function index()
    {
        return response()->json(new ThemeCollection(Theme::all()));
    }
}
