<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "Georkis",
            "email" => "georkis.santiesteban@gmail.com",
            "password" => Hash::make(value: '123456')
        ]);
        User::factory()->count(count: 10)->create();
    }
}
