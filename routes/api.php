<?php

use App\Http\Controllers\AuthGerenteController;
use Illuminate\Support\Facades\Route;

Route::post('/auth/gerente/login', [AuthGerenteController::class, 'login']);
