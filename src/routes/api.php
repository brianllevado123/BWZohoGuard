<?php

use Illuminate\Support\Facades\Route;
use brianllevado123\BWZohoGuard\Http\Controllers\APIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('validate.api.key')->group(function () {
    Route::post('/bitwarden-api-request', [APIController::class, 'handleBWApiRequest']);
});


