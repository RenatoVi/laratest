<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class CheckGerenteNivel
{
    public function handle(Request $request, Closure $next): Response
    {
        $routeName = $request->route()->getName();
        if (Arr::exists(Gate::abilities(), $routeName) && !Gate::allows($routeName)) {
            return response()->json([
                'message' => 'Você não tem permissão para acessar este recurso',
            ], 403);
        }
        return $next($request);
    }
}
