<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login_process');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/employee', [EmployeeController::class, 'index'])->name('emp.index');
Route::get('/employee/create', [EmployeeController::class, 'create'])->name('emp.create');
Route::post('/employee/store', [EmployeeController::class, 'store'])->name('emp.store');
Route::get('/employee/{id}/edit', [EmployeeController::class, 'edit'])->name('emp.edit');
Route::put('/employee/{id}/update', [EmployeeController::class, 'update'])->name('emp.update');
Route::delete('/employee/{id}/delete', [EmployeeController::class, 'delete'])->name('emp.delete');

Route::get('/position', [PositionController::class, 'index'])->name('jbt.index');
Route::get('/position/create', [PositionController::class, 'create'])->name('jbt.create');
Route::post('/position/store', [PositionController::class, 'store'])->name('jbt.store');
Route::get('/position/{id}/edit', [PositionController::class, 'edit'])->name('jbt.edit');
Route::put('/position/{id}/update', [PositionController::class, 'update'])->name('jbt.update');
Route::delete('/position/{id}/delete', [PositionController::class, 'delete'])->name('jbt.delete');