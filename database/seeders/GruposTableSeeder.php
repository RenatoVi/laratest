<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Grupo;
use Illuminate\Database\Seeder;

class GruposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Grupo::factory(5)->create();
    }
}
