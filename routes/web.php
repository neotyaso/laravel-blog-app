<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get("/blogs", [BlogController::class,"index"]);
Route::get("/blogs/create", [BlogController::class,"create"]);
Route::post("/blogs", [BlogController::class,"store"]);
Route::get("/blogs/{id}", [BlogController::class,"show"]);
Route::get("/blogs/{id}/edit", [BlogController::class,"edit"]);
Route::put("/blogs/{id}", [BlogController::class,"update"]);
Route::delete("/blogs/{id}", [BlogController::class,"destroy"]);
