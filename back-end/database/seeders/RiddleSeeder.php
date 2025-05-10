<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Riddle;

class RiddleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Riddle::insert([
            // Colonie
            [
                'id' => 10,
                'title' => 'Uniforme',
                'description' => 'Quel est la couleur du polo des membres de la Colonie ?',
                'chapter_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 11,
                'title' => 'Animal',
                'description' => 'Quel animal symbolise la Colonie ?',
                'chapter_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 12,
                'title' => 'Feu',
                'description' => 'Quel bois doit être utilisé pour faire du feu ?',
                'chapter_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 13,
                'title' => 'Activité',
                'description' => 'Comment s\'appellent les activités que l\'on fait le soir autour d\'un feu ?',
                'chapter_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 14,
                'title' => 'Foulard',
                'description' => 'Quel est le nom du noeud de foulard ?',
                'chapter_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Meute
            [
                'id' => 20,
                'title' => 'Unité',
                'description' => 'Comment se nomme un groupe de 6 Louvettes et Louveteaux ?',
                'chapter_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 21,
                'title' => 'PACCIF',
                'description' => 'Que signifie le P dans PACCIF ?',
                'chapter_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 22,
                'title' => 'Progression',
                'description' => 'Combien y\'a-t-il d\'étapes dans la progression de la Meute ?',
                'chapter_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 23,
                'title' => 'Déchiffrage',
                'description' => 'Comment se traduit le mot "Feu" en code morse ?',
                'chapter_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 24,
                'title' => 'Secourisme',
                'description' => 'Quel est le numéro de téléphone de la REGA ?',
                'chapter_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Troupe
            [
                'id' => 30,
                'title' => 'Histoire',
                'description' => 'Quel est le nom du fondateur du scoutisme ?',
                'chapter_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 31,
                'title' => 'Noeud',
                'description' => 'Quel noeud utilisons-nous pour relier 2 cordes de même diamètre ?',
                'chapter_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 32,
                'title' => 'Topographie',
                'description' => 'Sur les cartes suisses, en quelle couleur le réseau ferroviaire est-il représenté ?',
                'chapter_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 33,
                'title' => 'Pionnièrisme',
                'description' => 'Combien de sardines sont nécessaires à la construction d\'une tente octogonale ?',
                'chapter_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 34,
                'title' => 'Méthodologie',
                'description' => 'Quelle est la devise de la Troupe ?',
                'chapter_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Poste
            [
                'id' => 40,
                'title' => 'Topographie',
                'description' => 'Que signifie KME ?',
                'chapter_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 41,
                'title' => 'International',
                'description' => 'Où se trouve le Centre International Scout situé en Suisse ?',
                'chapter_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 42,
                'title' => 'Topographie',
                'description' => 'Quelle échelle de carte est favorisée pour les tracés d\une randonnée ?',
                'chapter_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 43,
                'title' => 'Sécurité',
                'description' => 'Est-t\'il conseillé d\'appliquer un garrot en cas de saignement ?',
                'chapter_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 44,
                'title' => 'Pionnièrisme',
                'description' => 'Quel type de corde doit être utilisé pour assurer une personne lors d\'une session d\'escalde ?',
                'chapter_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Route
            [
                'id' => 50,
                'title' => 'Jeunesse et Sport',
                'description' => 'Lors d\'un camp, combien d\'heures d\'activités adaptées aux directives de JS+ doivent être effectuées chaque jour ?',
                'chapter_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 51,
                'title' => 'Méthodologie',
                'description' => 'Combien de relations font partie du cadre du développement global ?',
                'chapter_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 52,
                'title' => 'Structure',
                'description' => 'Que signifie OMMS ?',
                'chapter_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 53,
                'title' => 'Administratif',
                'description' => 'En Suisse, quel est le nom de la plateforme digitale offrant de l\'aide à l\'organisation des camps ?',
                'chapter_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 54,
                'title' => 'Rôles',
                'description' => 'Quelle est la couleur de la cordelière d\'un.e responsable d\'unité ?',
                'chapter_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
