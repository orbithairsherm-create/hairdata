<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;


// Login page
Route::get('/', [CustomerController::class, 'login']);


// Login submit
Route::get('/check-login', [CustomerController::class, 'checkLogin']);


// Customer records
Route::get('/customer-records', [CustomerController::class, 'display']);


// Logout
Route::get('/logout', [CustomerController::class, 'logout']);