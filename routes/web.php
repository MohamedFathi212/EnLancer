<?php

use App\Http\Controllers\CategoriesController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categories',action: [CategoriesController::class,'index']);
Route::get('/categories/create',action: [CategoriesController::class,'create']);
Route::get('/categories/{id}',action: [CategoriesController::class,'show']);
Route::post('/categories',action: [CategoriesController::class,'store']);
Route::get('/categories/{id}/edit',action: [CategoriesController::class,'edit']);
Route::put('/categories/{id}',action: [CategoriesController::class,'update']);
Route::delete('/categories/{id}/',action: [CategoriesController::class,'destroy']);
