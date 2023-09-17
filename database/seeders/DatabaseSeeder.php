<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(GerentesTableSeeder::class);
        $this->call(ClientesTableSeeder::class);
        //$this->call(GruposTableSeeder::class);
    }
}
