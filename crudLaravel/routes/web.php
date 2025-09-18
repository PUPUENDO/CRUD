<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Asegúrate de haber corrido: php artisan migrate (crea tabla tasks)
Route::get('/', fn()=>redirect()->route('tasks.index'));
Route::resource('tasks', TaskController::class);
