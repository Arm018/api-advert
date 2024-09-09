<?php

use App\Http\Controllers\Api\AdvertController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/adverts', [AdvertController::class, 'index']);
Route::get('/adverts/{id}', [AdvertController::class, 'show']);
Route::post('/adverts', [AdvertController::class, 'store']);
