<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class FilmFakerSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
 
        for ($i = 0; $i < 10; $i++) {
            DB::table('films')->insert([
                'name' => $faker->sentence(3),
                'year' => $faker->year(),
                'genere' => $faker->randomElement(['Acción', 'Drama', 'Comedia', 'Terror', 'Sci-Fi']),
                'country' => $faker->country(),
                'duration' => $faker->numberBetween(80, 180),
                'img_url' => $faker->imageUrl(640, 480, 'movies'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        $this->command->info("Tabla films rellenada con éxito con Faker.");
    }
}