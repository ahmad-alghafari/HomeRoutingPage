<?php

namespace Database\Seeders;

use App\Models\pphoto;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            $id = $i + 10000 ;
            User::create([
                'id' => $id,
                'name' => $faker->name,
                'role' => 1,
                'status' => 0,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'), // You may want to generate a random password instead
            ]);

            $rand = rand(1, 14);
            pphoto::create([
                'user_id' => $id,
                'path' => $rand <= 9 ? "import/assets/images/avatar/"."0".$rand.".jpg" : "import/assets/images/avatar/".$rand.".jpg",
            ]);
        }
    }
}
