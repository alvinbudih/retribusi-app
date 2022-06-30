<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([UserSeeder::class]);
        $this->call([StatusUjiSeeder::class]);
        $this->call([MerkSeeder::class]);
        $this->call([TipeSeeder::class]);
        $this->call([JenisSeeder::class]);
        $this->call([BiayaSeeder::class]);
    }
}
