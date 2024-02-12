<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiTaskController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
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

    
});

Route::fallback(function () {
    return response()->json(['error' => 'Not Found'], 404);
});