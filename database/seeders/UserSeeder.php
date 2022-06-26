<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ["Admin", "Kasir", "Pelayanan"];

        for ($i = 0; $i < count($roles); $i++) {
            User::create([
                "name" => $roles[$i] . " PKB",
                "username" => strtolower($roles[$i]),
                "email" => strtolower($roles[$i]) . "@gmail.com",
                "password" => Hash::make("password")
            ]);

            Role::create([
                "role_name" => $roles[$i]
            ]);

            DB::table("role_user")->insert([
                "user_id" => $i + 1,
                "role_id" => $i + 1
            ]);

            DB::table("role_user")->insert([
                "user_id" => 4,
                "role_id" => $i + 1
            ]);
        }

        User::create([
            "name" => "Multirole",
            "username" => "multirole",
            "email" => "multirole@gmail.com",
            "password" => Hash::make("password")
        ]);
    }
}
