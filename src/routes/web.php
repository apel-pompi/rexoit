<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route; 
use Apel\Rexoit\Http\Controllers\TaskController;



Route::get('login',[TaskController::class,'index'])->name('login');
Route::post('login',[TaskController::class,'LoginUser']);

Route::get('registration',[TaskController::class,'registration'])->name('registration');
Route::post('registration',[TaskController::class,'savereg']);
Route::get('dashboard',[TaskController::class,'dashboard'])->name('dashboard');
Route::get('logout',[TaskController::class,'logout']);