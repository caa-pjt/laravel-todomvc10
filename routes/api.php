<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TodoApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('token', [TodoApiController::class, 'getToken']);

Route::middleware('auth:sanctum')->name('api.')->group(function() {

    Route::resource('todos', TodoApiController::class)->except(['show', 'create', 'edit']);

});