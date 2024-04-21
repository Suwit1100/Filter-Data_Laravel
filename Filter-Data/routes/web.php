<?php

use App\Http\Controllers\FilterDataController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FilterDataController::class, 'index'])->name('index');
