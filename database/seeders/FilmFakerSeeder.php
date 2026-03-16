<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmFakerSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('films')->insert([
                "name"       => "Pelicula $i",
                "year"       => 2020 + $i,     
                "genere"     => "Genero $i",   
                "country"    => "Pais $i",
                "duration"   => 90 + $i,
                "img_url"    => "https://picsum.photos/200",
                "created_at" => now(),         
                "updated_at" => now()
            ]);
        }
        $this->command->info("Tabla films rellenada correctamente");
    }
}