<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Grupo;
use App\Services\ClienteService;
use Illuminate\Http\JsonResponse;

class ClienteController extends Controller
{
    public function __construct(
        protected ClienteService $clienteService
    ){}

    public function adicionarClienteAGrupo(
        Cliente $cliente,
        Grupo $grupo
    ): JsonResponse
    {
        try {
            if(!$this->clienteService->adicionarClienteAGrupo($cliente, $grupo)) {
                throw new \Exception(__('customer.has_group'));
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
        return response()->json([
            'message' => __('customer.add_group_success')
        ], 200);
    }

    public function removerClienteAGrupo(
        Cliente $cliente,
        Grupo $grupo
    ): JsonResponse
    {
        try {
            if(!$this->clienteService->removerClienteAGrupo($cliente, $grupo)) {
                throw new \Exception(__('customer.not_has_group'));
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
        return response()->json([
            'message' => __('customer.remove_group_success')
        ], 200);
    }
}
