<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Chapter;


class ChapterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Chapter::insert([
            [
                'id' => 1,
                'title' => 'Colonie',
                'description' => 'Vie des première aventures dans le monde du scoutisme.',
                'points_needed' => 0,
                'story_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'title' => 'Meute',
                'description' => 'Obtiens ta première chemise et découvre de nouvelles aventures avec tes amis Louvettes et Louveteaux.',
                'points_needed' => 40,
                'story_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'title' => 'Troupe',
                'description' => 'Tu vas commencer à partir en raid, passer tes camps sous tente et utiliser des outils dangereux.',
                'points_needed' => 80,
                'story_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 4,
                'title' => 'Poste',
                'description' => 'Tu découvres l\'indépendance et organise toi-même les activités pour ton unité.',
                'points_needed' => 120,
                'story_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 5,
                'title' => 'Route',
                'description' => 'Tu es maintenant responsable. À ton tour d\'organiser et animer les activité pour les plus petits.',
                'points_needed' => 160,
                'story_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
