<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

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


Route::get('/items', [ItemController::class, 'index']);
Route::get('/items/create', [ItemController::class, 'create']);
Route::post('/items', [ItemController::class, 'store']);
Route::get('/items/edit/{id}', [ItemController::class, 'edit']);
Route::put('/items/edit/{id}', [ItemController::class, 'update']);
Route::get('/items/{id}', [ItemController::class, 'show']);
Route::get('/items/delete/{id}', [ItemController::class, 'delete']);