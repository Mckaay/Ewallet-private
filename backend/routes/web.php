<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => xdebug_info());

require __DIR__ . '/auth.php';
