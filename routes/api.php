<?php

use App\Http\Controllers\AccountCredentialsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ListFolderController;
use App\Http\Controllers\ListItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinksController;
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


Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');

});


Route::middleware(['auth:sanctum'])->resource('links', LinksController::class)->except(['show']);
Route::middleware(['auth:sanctum'])->resource('credentials', AccountCredentialsController::class)->except(['show']);
Route::middleware(['auth:sanctum'])->resource('folder', ListFolderController::class)->except(['show']);
Route::middleware(['auth:sanctum'])->resource('list', ListItemController::class)->except(['show']);
