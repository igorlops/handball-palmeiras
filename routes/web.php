<?php

use App\Http\Controllers\CadastroController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('cadastro.create');
});

Route::get('/atletas', [CadastroController::class, 'index'])->name('cadastro.index');
Route::get('/cadastro', [CadastroController::class, 'create'])->name('cadastro.create');
Route::get('/cadastro/{id}', [CadastroController::class, 'show'])->name('cadastro.show');
Route::post('/cadastro', [CadastroController::class, 'store'])->name('cadastro.store');
Route::post('/cadastro-export', [CadastroController::class, 'export'])->name('cadastro.export');
