<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login_process');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/employee', [EmployeeController::class, 'index'])->name('emp.index');
Route::get('/employee/create', [EmployeeController::class, 'create'])->name('emp.create');
Route::post('/employee/store', [EmployeeController::class, 'store'])->name('emp.store');
Route::get('/employee/{id}/edit', [EmployeeController::class, 'edit'])->name('emp.edit');
Route::delete('/employee/{id}/delete', [EmployeeController::class, 'delete'])->name('emp.delete');