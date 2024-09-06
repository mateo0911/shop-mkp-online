<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\Request\UsuarioController as requestUsuarioController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AutenticacionController;

Route::get("/", [LoginController::class, "cargarLogin"]);
Route::get("/index", [ProductoController::class, "index"]);
Route::post("getLinkMarket", [ProductoController::class, "getLinksByProducts"]);
Route::post("autentica", [AutenticacionController::class, "validarLogin"]);
Route::get("logout", [AutenticacionController::class, "logout"]);

Route::prefix("usuario")->group(function () {
    Route::get("/", [UsuarioController::class, "cargarUsuario"]);
    Route::post("guardar", [requestUsuarioController::class, "Crear"]);
});

Route::prefix("login")->group(function () {
    Route::get("cargar", [LoginController::class, "cargarLogin"]);
});
