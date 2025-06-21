<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

Route::get('/',[HomeController::class,'home'])->name('home');


//------------------------- USERS -------------------------//
Route::resource('users', UserController::class);


//------------------------- PROJECTS -------------------------//
Route::resource('projects', ProjectController::class);



//------------------------- TASKS -------------------------//
Route::resource('tasks', TaskController::class);

