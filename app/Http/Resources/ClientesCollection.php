<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientesCollection extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'nome' => $this->nome,
            'cnpj' => $this->cnpj,
            'data_fundacao' => $this->data_fundacao,
        ];
    }
}
