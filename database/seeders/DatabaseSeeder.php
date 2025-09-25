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
        // Si tu veux créer des users de test un jour, tu peux décommenter
        // \App\Models\User::factory(10)->create();

        // Et ici tu ajoutes ton seeder des catégories
        $this->call(CategorieSeeder::class);
    }
}
