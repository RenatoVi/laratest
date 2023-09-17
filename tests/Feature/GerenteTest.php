<?php

namespace Tests\Feature;

use App\Models\Gerente;
use App\Models\Grupo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class GerenteTest extends TestCase
{

    public function testCriarGerente()
    {
        Gerente::factory()->create([
            'nome' => 'Exemplo Gerente',
            'email' => 'gerente@example.com',
            'nivel' => 1,
        ]);

        $this->assertDatabaseHas('gerentes', [
            'nome' => 'Exemplo Gerente',
            'email' => 'gerente@example.com',
            'nivel' => 1,
        ]);
    }

    public function testGerenteNivel1NaoPodeEditarGrupo()
    {
        $gerenteNivel1 = Gerente::factory()->create(['nivel' => 1]);

        Passport::actingAs($gerenteNivel1);

        $grupo = Grupo::factory()->create();

        $response = $this->json(
            'PUT',
            "/api/grupo/atualizar/{$grupo->id}",
            ['nome' => 'Novo Nome do Grupo']
        );

        $response->assertStatus(403);
    }

    public function testGerenteNivel2PodeEditarGrupo()
    {
        $gerenteNivel1 = Gerente::factory()->create(['nivel' => 2]);

        Passport::actingAs($gerenteNivel1);

        $grupo = Grupo::factory()->create();

        $response = $this->json(
            'PUT',
            "/api/grupo/atualizar/{$grupo->id}",
            ['nome' => 'Novo Nome do Grupo']
        );

        $response->assertStatus(200);
    }
}
