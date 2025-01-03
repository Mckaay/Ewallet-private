<?php

declare(strict_types=1);

use App\Http\Controllers\Api\V1\ThemeController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->prefix('themes')->name('themes:')->group(function (): void {
    Route::get('/', [ThemeController::class,'index'])->name('index');
});
