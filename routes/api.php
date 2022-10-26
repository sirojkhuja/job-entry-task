<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProductAuditController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', AuthController::class);

// When unauthorized, middleware returns whole login page
// Authenticate middleware was changed to redirect to this route if requested endpoint starts with api/*
Route::get('/unauthorized', function () {
    return response()->json([
        'message' => 'Unauthenticated'
    ], 401);
})->name('unauthorized');

Route::middleware('auth:sanctum')->get('/product-change-history', ProductAuditController::class);
