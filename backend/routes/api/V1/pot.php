<?php

declare(strict_types=1);

use App\Http\Controllers\Api\V1\PotController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->prefix('pots')->name('pots:')->group(function (): void {
    Route::get('/', [PotController::class,'index'])->name('index');
    Route::post('/', [PotController::class,'store'])->name('store');
    Route::put('{pot}', [PotController::class,'update'])->name('update');
    Route::delete('{pot}', [PotController::class,'delete'])->name('delete');
});
