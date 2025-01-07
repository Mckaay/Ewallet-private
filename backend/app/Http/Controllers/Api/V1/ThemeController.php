<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Category\CategoryCollection;
use App\Http\Resources\V1\Theme\ThemeCollection;
use App\Models\Category;
use App\Models\Theme;
use Illuminate\Http\JsonResponse;

final class ThemeController extends Controller
{
    public function index()
    {
        return response()->json(new ThemeCollection(Theme::all()));
    }
}
