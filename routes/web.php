<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\Request\UsuarioController as requestUsuarioController;
use App\Http\Controllers\UsuarioController;

Route::get("/index", [ProductoController::class, "index"]);
Route::post("getLinkMarket", [ProductoController::class, "getLinksByProducts"]);


Route::prefix("usuario")->group(function () {
    Route::get("/", [UsuarioController::class, "cargarUsuario"]);
    Route::post("guardar", [requestUsuarioController::class, "Crear"]);
});
