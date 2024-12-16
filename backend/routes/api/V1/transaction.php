<?php

declare(strict_types=1);

use App\Http\Controllers\Api\V1\TransactionController;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth:sanctum')->prefix('pots')->name('pots:')->group(function (): void {
//    Route::get('/', [TransactionController::class,'index'])->name('index');
//    Route::post('/', [TransactionController::class,'store'])->name('store');
//    Route::put('{pot}', [TransactionController::class,'update'])->name('update');
//    Route::delete('{pot}', [TransactionController::class,'delete'])->name('delete');
//});

Route::prefix('transactions')->name('transactions:')->group(function (): void {
    Route::get('/', [TransactionController::class,'index'])->name('index');
    Route::post('/', [TransactionController::class,'store'])->name('store');
    Route::put('{pot}', [TransactionController::class,'update'])->name('update');
    Route::delete('{pot}', [TransactionController::class,'delete'])->name('delete');
});

