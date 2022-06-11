<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

            RoleUser::create([
                "user_id" => $i + 1,
                "role_id" => $i + 1
            ]);

            RoleUser::create([
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
