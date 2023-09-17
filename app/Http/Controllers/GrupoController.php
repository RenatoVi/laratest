<?php

namespace App\Http\Controllers;

use App\Http\Requests\GrupoRequest;
use App\Http\Resources\ClientesCollection;
use App\Models\Grupo;
use Illuminate\Http\JsonResponse;

class GrupoController extends Controller
{
    public function criar(GrupoRequest $request): JsonResponse
    {
        try {
            $grupo = Grupo::create($request->validated());
        } catch (\Exception $exception) {
            return response()->json([
                'message' => __('group.create_group_error'),
                'error' => $exception->getMessage(),
            ], 500);
        }
        return response()->json([
            'message' => __('group.create_group_success'),
            'grupo' => $grupo,
        ], 201);
    }

    public function atualizar(GrupoRequest $request, Grupo $grupo): JsonResponse
    {
        try {
            $grupo->update($request->validated());
        } catch (\Exception $exception) {
            return response()->json([
                'message' => __('group.update_group_error'),
            ], 500);
        }
        return response()->json([
            'message' => __('group.update_group_success'),
            'grupo' => $grupo,
        ], 200);
    }

    public function deletar(Grupo $grupo): JsonResponse
    {
        try {
            $grupo->delete();
        } catch (\Exception $exception) {
            return response()->json([
                'message' => __('group.delete_group_error'),
            ], 500);
        }
        return response()->json([
            'message' => __('group.delete_group_success'),
        ], 200);
    }

    public function listar(): JsonResponse
    {
        try {
            $grupos = Grupo::all();
        } catch (\Exception $exception) {
            return response()->json([
                'message' => __('group.list_group_error'),
                'error' => $exception->getMessage(),
            ], 500);
        }
        return response()->json([
            'message' => __('group.list_group_success'),
            'grupos' => $grupos,
        ], 200);
    }

    public function mostrar(Grupo $grupo): JsonResponse
    {
        try {
            $clientes = $grupo->clientes;
            if ($clientes->isEmpty()) {
                throw new \Exception(__('group.group_not_has_customer'));
            }
        } catch (\Exception $exception) {
            return response()->json([
                'message' => __('group.show_group_error'),
                'error' => $exception->getMessage(),
            ], 500);
        }
        return response()->json([
            'message' => __('group.show_group_success'),
            'grupo' => $grupo->nome,
            'clientes' => ClientesCollection::collection($clientes),
        ], 200);
    }
}
