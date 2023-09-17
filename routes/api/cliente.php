<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;

Route::controller(ClienteController::class)->middleware(['auth:api'])->group(function () {
    Route::get('/adicionar/{cliente}/grupo/{grupo}', 'adicionarClienteAGrupo')->name('cliente.adicionar');
    Route::get('/remover/{cliente}/grupo/{grupo}', 'removerClienteAGrupo')->name('cliente.remover');
});
