<?php

use App\Http\Controllers\TipeKendaraanApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserApiController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::prefix("user")->group(function () {
//     Route::get("/{id}", [UserApiController::class, "get"]);
// });
Route::get("/tipe/{id}", [TipeKendaraanApiController::class, "get"]);
Route::get("/tipe", [TipeKendaraanApiController::class, "get"]);
