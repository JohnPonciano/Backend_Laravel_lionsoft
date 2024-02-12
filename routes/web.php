<?php

use App\Http\Controllers\ApiAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiTaskController;


Route::get('/', function () {
    return redirect()->route('login');
});



//Importa apenas as rotas relacionadas 
// /api/tasks (Ainda não pensei em uma maneira melhor de fazer essa importação)
require base_path('routes/api.php');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('todo', 'App\Http\Controllers\TodosController');

