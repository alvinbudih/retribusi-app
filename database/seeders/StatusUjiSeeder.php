<?php

namespace Database\Seeders;

use App\Models\StatusUji;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusUjiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusUji::create([
            "status" => "Uji Pertama"
        ]);

        StatusUji::create([
            "status" => "Uji Berkala"
        ]);
    }
}
