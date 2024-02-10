<?php

use App\Http\Controllers\ApiAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiTaskController;


Route::get('/', function () {
    return redirect()->route('login');
});

// Rota para login da API
Route::post('/api/login', [ApiAuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    // Rotas da API para tarefas usando o ApiTaskController
    Route::get('/api/tasks', [ApiTaskController::class, 'index']);
    Route::post('/api/tasks', [ApiTaskController::class, 'store']);
    Route::get('/api/tasks/{id}', [ApiTaskController::class, 'show']);
    Route::put('/api/tasks/{id}', [ApiTaskController::class, 'update']);
    Route::delete('/api/tasks/{id}', [ApiTaskController::class, 'destroy']);

    // Rota para logout da API
    Route::post('/api/logout', [ApiAuthController::class, 'logout']);
});

Route::fallback(function () {
    return response()->json(['error' => 'Not Found'], 404);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('todo', 'App\Http\Controllers\TodosController');

