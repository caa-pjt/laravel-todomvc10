<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TodoController;

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

Route::resource('todos', TodoController::class)->except(['show']);

Route::get('/', [TodoController::class, 'index']);

Route::get("/hello", function () {
    return "Hello World !";
});
