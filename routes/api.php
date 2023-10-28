<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

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
Route::get('/company',[CompanyController::class,'showAll'])->name('company.showAll');
Route::get('/company/{id}',[CompanyController::class,'show'])->name('company.show');

// Employees

Route::post('/employee', [EmployeeController::class, 'store'])->name('employee.store');
Route::patch('/employee/{id}', [EmployeeController::class, 'update'])->name('employee.edit');
Route::delete('/employee/{id}', [EmployeeController::class, 'destroy'])->name('employee.delete');
Route::get('/employee/{count?}', [EmployeeController::class, 'showAll'])->name('employee.showAll');
Route::get('/employee/get/{id}', [EmployeeController::class, 'show'])->name('employee.show');

Route::post('/login',[LoginController::class,'login'])->name('login');
Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');



