<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class ActorFAkerSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 10; $i++) {
            DB::table('actors')->insert(array(
                "name"       => $faker->firstName,
                "surname"    => $faker->lastName,
                "birthdate"  => $faker->date('Y-m-d', '2005-01-01'),
                "country"    => $faker->country,
                "img_url"    => $faker->imageUrl(200, 300, 'people'),
                "created_at" => now(),
                "updated_at" => now()
            ));
        }

        $this->command->info("La tabla actors ha sido rellenada con éxito con datos aleatorios.");
    }
}