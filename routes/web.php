<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", [ProductController::class, "page"])->name("home.page");

Route::get("/create", [ProductController::class, "page"])->name("create.page");
Route::post("/create", [ProductController::class, "create"]);

Route::get("/update/{id}", [ProductController::class, "page"])->name("update.page")->whereNumber("id");
Route::put("/update/{id}", [ProductController::class, "update"])->whereNumber("id");

Route::delete("/delete/{id}", [ProductController::class, "delete"])->whereNumber("id")->name("product.delete");
