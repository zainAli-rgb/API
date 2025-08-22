<?php

use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\membercontroller;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('test', [StudentController::class, 'index']);
Route::post('add', [StudentController::class, 'add']);
Route::put('update', [StudentController::class, 'update']);
Route::delete('delete/{id}', [StudentController::class, 'delete']);

Route::resource('member', membercontroller::class);

