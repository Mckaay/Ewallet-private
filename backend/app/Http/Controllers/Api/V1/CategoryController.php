<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Category;

final class CategoryController extends Controller
{
    public function index()
    {
        return response()->json(
            [
                'data' => Category::query()->orderBy('id')->pluck('name', 'id')->toArray(),
            ],
        );
    }
}
