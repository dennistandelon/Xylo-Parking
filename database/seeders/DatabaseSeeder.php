<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
use DB;
use Faker\factory as Faker;

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

        $faker = Faker::create("id_ID");
        DB::table('users')->insert([
            'name' => $faker->name(),
            'email' => "admin@schoolalive.edu",
            'email_verified_at' => now(),
            'role' => 1,
            'password' => bcrypt("admin123"),
            'remember_token' => Str::random(10),
        ]);
    }
}
