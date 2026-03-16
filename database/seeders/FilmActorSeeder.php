<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmActorSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('film_actor')->truncate();
       
        $filmIds = DB::table('films')->pluck('id')->toArray();
        $actorIds = DB::table('actors')->pluck('id')->toArray();
 
        foreach ($filmIds as $filmId) {
 
            $randomActors = collect($actorIds)->random(rand(1, 4));
 
            foreach ($randomActors as $actorId) {
                DB::table('film_actor')->insert([
                    'film_id' => $filmId,
                    'actor_id' => $actorId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        $this->command->info("Relaciones Película-Actor creadas con éxito.");
    }
}
