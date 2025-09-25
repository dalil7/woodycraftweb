<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            ['nom' => 'Animaux', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Monuments', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Voitures', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
