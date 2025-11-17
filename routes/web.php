<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'main']);
Route::get('/home', [PageController::class, 'main']);
Route::get('/details', [PageController::class, 'details']);
Route::get('/contact', [PageController::class, 'contact']);
Route::get('/offers', [PageController::class, 'offers']);
