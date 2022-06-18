<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/', '/login');

Route::middleware("guest")->group(function () {
    Route::get("/login", function () {
        return view("auth.login", [
            "title" => "Login"
        ]);
    })->name("login");

    Route::post("/login", [LoginController::class, "authenticate"])->name("login.auth");
});


Route::middleware("auth")->group(function () {
    Route::get("/logout", [LoginController::class, "logout"])->name("logout");

    Route::get("/dashboard", function () {
        // dd(auth()->user()->roles);
        return view("dashboard.index", [
            "title" => "Dashboard"
        ]);
    })->name("dashboard");

    Route::middleware("admin")->group(function () {
        Route::resource("/dashboard/user", UserController::class)->except("show");
        Route::resource("/dashboard/akun", AkunController::class)->except("show");
    });

    // Route::get("/admin", function () {
    //     return "this is admin page";
    // })->middleware("admin");

    // Route::get("/pelayanan", function () {
    //     return "this is pelayanan page";
    // })->middleware("pelayanan");

    // Route::get("/kasir", function () {
    //     return "this is kasir page";
    // })->middleware("kasir");
});
