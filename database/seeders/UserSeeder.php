<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userAdmin = User::create([
            "name" => "Georkis",
            "email" => "georkis.santiesteban@gmail.com",
            "password" => Hash::make(value: '123456'),
        ]);

        $userAdmin->assignRole("Admin");

        $moderador = User::create([
            "name" => "Modedador",
            "email" => "moderadores@jovenclub.com",
            "password" => Hash::make(value: "123456"),
        ]);

        $moderador->assignRole('Staff');

        User::factory()->count(count: 10)->create();
    }
}
