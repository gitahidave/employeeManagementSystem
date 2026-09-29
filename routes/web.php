<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('employees.index');
});

// Resource routes cover index, create, store, show, edit, update, destroy
Route::resource('employees', EmployeeController::class);