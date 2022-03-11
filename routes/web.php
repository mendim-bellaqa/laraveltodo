<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;

Route::get('/',[HomeController::class, 'index'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->group(function(){


    Route::get('/todo',[TodoController::class, 'add']);
    Route::post('/todo',[TodoController::class, 'create']);
    Route::get('/todo/{todo}', [TodoController::class, 'edit']);
    Route::post('/todo/{todo}', [TodoController::class, 'update']);
});
