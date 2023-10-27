<?php

use App\Http\Controllers\CompanyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/company',[CompanyController::class,'store'])->name('company.store');
Route::patch('/company/{id}',[CompanyController::class,'update'])->name('company.update');
Route::delete('/company/{id}',[CompanyController::class,'destroy'])->name('company.delete');
Route::get('/company',[CompanyController::class,'showAll'])->name('company.show');
Route::get('/company/{id}',[CompanyController::class,'show'])->name('company.show');

