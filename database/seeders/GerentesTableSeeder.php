<?php

namespace Database\Seeders;

use App\Models\Gerente;
use Illuminate\Database\Seeder;

class GerentesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gerente::factory()->create(
            [
                'nome' => 'Gerente 1',
                'email' => 'gerente1@exemple.com',
                'nivel' => 1,
            ]
        );

        Gerente::factory()->create(
            [
                'nome' => 'Gerente 2',
                'email' => 'gerente2@exemple.com',
                'nivel' => 2,
            ]
        );
    }
}
