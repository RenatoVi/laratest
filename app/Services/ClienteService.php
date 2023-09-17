<?php

namespace App\Services;

use App\Models\Cliente;
use App\Models\Grupo;

class ClienteService
{
    public function adicionarClienteAGrupo(Cliente $cliente, Grupo $grupo): bool
    {
        if ($cliente->grupos()->count()) {
            return false;
        }

        $cliente->grupos()->attach($grupo);
        return true;
    }

    public function removerClienteAGrupo(Cliente $cliente, Grupo $grupo): bool
    {
        if (!$cliente->grupos()->count()) {
            return false;
        }

        $cliente->grupos()->detach($grupo);
        return true;
    }
}
