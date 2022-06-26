<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\BiayaController;
use App\Http\Controllers\JenisKendaraanController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MerkKendaraanController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\StatusUjiController;
use App\Http\Controllers\TipeKendaraanController;
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
        Route::resource("/dashboard/status", StatusUjiController::class)->except(["show", "destroy"]);
        Route::resource("/dashboard/biaya", BiayaController::class)->except(["show", "destroy"]);

        Route::prefix("/dashboard/menu-kendaraan")->group(function () {
            Route::resource("/pemilik", PemilikController::class)->except("show");
            Route::resource("/merk", MerkKendaraanController::class)->except(["show", "destroy"]);
            Route::resource("/tipe", TipeKendaraanController::class)->except(["show", "destroy"]);
            Route::resource("/jenis", JenisKendaraanController::class)->except(["show", "destroy"]);
            Route::resource("/kendaraan", KendaraanController::class);
        });
    });

    Route::middleware("pelayanan")->group(function () {
        Route::prefix("/dashboard/pendaftaran")->group(function () {
            Route::controller(PendaftaranController::class)->group(function () {
                Route::get("/rekapan-pendaftaran", "rekapanPendaftaran")->name("rekap.pendaftaran");
                Route::get("/form-pendaftaran", "formPendaftaran")->name("form.pendaftaran");
            });
        });
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
