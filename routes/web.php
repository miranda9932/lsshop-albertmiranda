<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'main']);
Route::get('/home', [PageController::class, 'main']);

// Details view (show product) and update/delete actions
Route::get('/details/{product}', [PageController::class, 'details']);
Route::match(['put','patch'], '/details/{product}', [PageController::class, 'update']);
Route::delete('/details/{product}', [PageController::class, 'destroy']);

// Create product
Route::get('/products/create', [PageController::class, 'create']);
Route::post('/products', [PageController::class, 'store']);

Route::get('/contact', [PageController::class, 'contact']);
Route::get('/offers', [PageController::class, 'offers']);
