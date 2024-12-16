<?php

declare(strict_types=1);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', fn(Request $request) => $request->user());

Route::prefix('V1')->group(
    [
        base_path('routes/api/V1/budget.php'),
        base_path('routes/api/V1/pot.php'),
        base_path('routes/api/V1/transaction.php'),
    ],
);
