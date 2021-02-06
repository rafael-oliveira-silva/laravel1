<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class);

Route::prefix('/tasks')->group(function(){

    Route::get('/', [TasksController::class, 'index'])->name('listTask'); // Listagem de Tarefas

    Route::get('add', [TasksController::class, 'create'])->name('createTask'); // Tela de adição de nova tarefa
    Route::post('add', [TasksController::class, 'store']); // Ação de adição de nova tarefa

    Route::get('edit/{id}', [TasksController::class, 'edit'])->name('editTask'); // Tela de edição de nova tarefa
    Route::post('edit/{id}', [TasksController::class, 'update']); // Ação de edição de nova tarefa

    Route::get('delete/{id}', [TasksController::class, 'destroy'])->name('destroyTask'); // Ação de deletar

    Route::get('check/{id}', [TasksController::class, 'check'])->name('checkTask'); // Ação de marcar como resolvido ou não
});
