<?php

namespace Tests\Feature;

use App\Models\Cliente;
use App\Models\Gerente;
use App\Models\Grupo;
use App\Services\ClienteService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class ClienteTest extends TestCase
{

    public function testCriarCliente()
    {
        Cliente::factory()->create([
            'nome' => 'Exemplo Cliente',
            'cnpj' => '123456789',
            'data_fundacao' => '2022-01-01',
        ]);

        $this->assertDatabaseHas('clientes', [
            'nome' => 'Exemplo Cliente',
            'cnpj' => '123456789',
            'data_fundacao' => '2022-01-01',
        ]);
    }

    public function testAdicionarClienteAGrupo()
    {
        $gerenteNivel = Gerente::factory()->create(['nivel' => 1]);
        $cliente = Cliente::factory()->create();
        $grupo = Grupo::factory()->create();

        Passport::actingAs($gerenteNivel);
        $response = $this->getJson("/api/cliente/adicionar/{$cliente->id}/grupo/{$grupo->id}");

        $response->assertStatus(200);
        $response->assertJson(['message' => __('customer.add_group_success')]);
    }

    public function testRemoverClienteAGrupo()
    {
        $gerenteNivel = Gerente::factory()->create(['nivel' => 1]);
        $cliente = Cliente::factory()->create();
        $grupo = Grupo::factory()->create();

        Passport::actingAs($gerenteNivel);
        /** @var ClienteService $clienteService */
        $clienteService = app(ClienteService::class);
        $clienteService->adicionarClienteAGrupo($cliente, $grupo);

        $response = $this->getJson("/api/cliente/remover/{$cliente->id}/grupo/{$grupo->id}");

        $response->assertStatus(200);
        $response->assertJson(['message' => __('customer.remove_group_success')]);
    }
}
