<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

Route::get('/', [ClientController::class, 'index']);
Route::post('/', [ClientController::class, 'post']);
Route::post('/add', [ClientController::class, 'create']);
Route::get('/management', [ClientController::class, 'management']);
Route::get('/del', [ClientController::class, 'delete']);