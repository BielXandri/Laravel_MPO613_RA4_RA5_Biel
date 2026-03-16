<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActorFAkerSeeder extends Seeder
{
        public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('actors')->insert(array(
                "name"       => "Actor$i",
                "surname"    => "Apellido$i",
                "birthdate"  => "19" . (70 + $i) . "-01-01",
                "country"    => "Pais$i",
                "img_url"    => "https://picsum.photos/id/" . ($i + 50) . "/200/300",
                "created_at" => now(),
                "updated_at" => now()
            ));
        }

        $this->command->info("La tabla actors ha sido rellenada con éxito");
    }
}