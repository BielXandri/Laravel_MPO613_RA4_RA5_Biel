<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmActorSeeder extends Seeder
{
    public function run(): void
    {

        $filmIds = DB::table('films')->pluck('id')->toArray();
        $actorIds = DB::table('actors')->pluck('id')->toArray();

        foreach ($filmIds as $fId) {
            $numActors = rand(1, 3);
            shuffle($actorIds);
            $selectedActors = array_slice($actorIds, 0, $numActors);

            foreach ($selectedActors as $aId) {
                DB::table('films_actor')->insert([
                    'film_id'    => $fId,
                    'actor_id'   => $aId,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }

        $this->command->info("Relaciones Película-Actor creadas con éxito.");
    }
}
