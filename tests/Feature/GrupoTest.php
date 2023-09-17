<?php

namespace Tests\Feature;

use App\Models\Gerente;
use App\Models\Grupo;
use Laravel\Passport\Passport;
use Tests\TestCase;

class GrupoTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $gerenteNivel1 = Gerente::factory()->create(['nivel' => 2]);
        Passport::actingAs($gerenteNivel1);
    }

    public function testCriarGrupo()
    {
        $dados = ['nome' => 'Novo Grupo'];

        $response = $this->postJson('/api/grupo/criar', $dados);

        $response->assertStatus(201);
        $response->assertJson(['message' => __('group.create_group_success')]);
        $this->assertDatabaseHas('grupos', $dados);
    }

    public function testAtualizarGrupo()
    {
        $grupo = Grupo::factory()->create();
        $dados = ['nome' => 'Novo Nome'];

        $response = $this->putJson("/api/grupo/atualizar/{$grupo->id}", $dados);

        $response->assertStatus(200);
        $response->assertJson(['message' => __('group.update_group_success')]);
        $this->assertDatabaseHas('grupos', ['id' => $grupo->id, 'nome' => 'Novo Nome']);
    }

    public function testDeletarGrupo()
    {
        $grupo = Grupo::factory()->create();

        $response = $this->deleteJson("/api/grupo/deletar/{$grupo->id}");

        $response->assertStatus(200);
        $response->assertJson(['message' => __('group.delete_group_success')]);
        $this->assertDatabaseMissing('grupos', ['id' => $grupo->id]);
    }

    public function testListarGrupos()
    {
        Grupo::factory()->count(3)->create();

        $response = $this->get('/api/grupo/listar');
        $response->assertStatus(200);
        $response->assertJson(['message' => __('group.list_group_success')]);
    }
}
