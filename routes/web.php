<?php

use App\Http\Controllers\CadastroController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('cadastro.create');
});

Route::get('/atletas', [CadastroController::class, 'index'])->name('cadastro.index');
Route::get('/cadastro', [CadastroController::class, 'create'])->name('cadastro.create');
Route::post('/cadastro', [CadastroController::class, 'store'])->name('cadastro.store');
Route::get('/cadastro/{cadastro}', [CadastroController::class, 'show'])->name('cadastro.show');
Route::get('/cadastro/{cadastro}/edit', [CadastroController::class, 'edit'])->name('cadastro.edit');
Route::patch('/cadastro/{cadastro}', [CadastroController::class, 'update'])->name('cadastro.update');
Route::delete('/cadastro/{cadastro}', [CadastroController::class, 'destroy'])->name('cadastro.delete');
Route::post('/cadastro-export', [CadastroController::class, 'export'])->name('cadastro.export');
