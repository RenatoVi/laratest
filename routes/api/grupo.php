<?php

use App\Http\Controllers\GrupoController;
use Illuminate\Support\Facades\Route;

Route::controller(GrupoController::class)->middleware(['auth:api','gerente.nivel'])->group(function () {
        Route::post('/criar', 'criar')->name('grupo.criar');
        Route::put('/atualizar/{grupo:id}', 'atualizar')->name('grupo.atualizar');
        Route::delete('/deletar/{grupo:id}', 'deletar')->name('grupo.deletar');
        Route::get('/listar', 'listar')->name('grupo.listar');
        Route::get('/mostrar/{grupo:id}', 'mostrar')->name('grupo.mostrar');
});
