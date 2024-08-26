<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
});
Route::get("/index", [ProductoController::class, "index"]);
Route::post("getLinkMarket", [ProductoController::class, "getLinksByProducts"]);
