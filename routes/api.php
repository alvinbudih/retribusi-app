<?php

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
Route::get("/tipe/{id}", function ($id) {
    $statusCode = 200;
    $message = "success";

    return response()->json([
        "statusCode" => $statusCode,
        "message" => $message,
        "data" => App\Models\TipeKendaraan::where("merk_kendaraan_id", $id)->get()
    ], $statusCode);
});
