<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BengkelApiController;

// Route Endpoint RESTful API Bengkel
Route::apiResource('bengkels', BengkelApiController::class);