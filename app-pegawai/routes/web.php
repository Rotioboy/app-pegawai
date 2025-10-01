<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    // Arahkan user ke route 'employees.index'
    return redirect()->route('employees.index'); 
});

Route::resource('employees', EmployeeController::class);