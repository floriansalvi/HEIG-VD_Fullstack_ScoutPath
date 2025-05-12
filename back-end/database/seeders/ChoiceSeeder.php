<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Choice;

class ChoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {        
        Choice::insert([
            [
                'description' => 'Bleu',
                'points_awarded' => 0,
                'riddle_id' => 10,
                'next_riddle_id' => 11,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'Jaune',
                'points_awarded' => 10,
                'riddle_id' => 10,
                'next_riddle_id' => 11,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'Une fourmi',
                'points_awarded' => 0,
                'riddle_id' => 11,
                'next_riddle_id' => 12,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'Un castor',
                'points_awarded' => 10,
                'riddle_id' => 11,
                'next_riddle_id' => 12,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'Le bois vert',
                'points_awarded' => 0,
                'riddle_id' => 12,
                'next_riddle_id' => 13,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'Le bois sec',
                'points_awarded' => 10,
                'riddle_id' => 12,
                'next_riddle_id' => 13,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'Des nuitées',
                'points_awarded' => 0,
                'riddle_id' => 13,
                'next_riddle_id' => 14,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'Des veillées',
                'points_awarded' => 10,
                'riddle_id' => 13,
                'next_riddle_id' => 14,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'Noeud triangulaire',
                'points_awarded' => 0,
                'riddle_id' => 14,
                'next_riddle_id' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'Noeud carré',
                'points_awarded' => 10,
                'riddle_id' => 14,
                'next_riddle_id' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'Une Horde',
                'points_awarded' => 0,
                'riddle_id' => 20,
                'next_riddle_id' => 21,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'Une Sizaine',
                'points_awarded' => 10,
                'riddle_id' => 20,
                'next_riddle_id' => 21,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'Pelle',
                'points_awarded' => 0,
                'riddle_id' => 21,
                'next_riddle_id' => 22,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'Papier',
                'points_awarded' => 10,
                'riddle_id' => 21,
                'next_riddle_id' => 22,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => '5',
                'points_awarded' => 0,
                'riddle_id' => 22,
                'next_riddle_id' => 23,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => '3',
                'points_awarded' => 10,
                'riddle_id' => 22,
                'next_riddle_id' => 23,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => '.../---/...',
                'points_awarded' => 0,
                'riddle_id' => 23,
                'next_riddle_id' => 24,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => '..-././..-',
                'points_awarded' => 10,
                'riddle_id' => 23,
                'next_riddle_id' => 24,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => '1441',
                'points_awarded' => 0,
                'riddle_id' => 24,
                'next_riddle_id' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => '1414',
                'points_awarded' => 10,
                'riddle_id' => 24,
                'next_riddle_id' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'Richard Baden-Powell',
                'points_awarded' => 0,
                'riddle_id' => 30,
                'next_riddle_id' => 31,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'Robert Baden-Powell',
                'points_awarded' => 10,
                'riddle_id' => 30,
                'next_riddle_id' => 31,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'Noeud de Huit',
                'points_awarded' => 0,
                'riddle_id' => 31,
                'next_riddle_id' => 32,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'Noeud Plat',
                'points_awarded' => 10,
                'riddle_id' => 31,
                'next_riddle_id' => 32,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'Bleu',
                'points_awarded' => 0,
                'riddle_id' => 32,
                'next_riddle_id' => 33,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'Rouge',
                'points_awarded' => 10,
                'riddle_id' => 32,
                'next_riddle_id' => 33,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => '12',
                'points_awarded' => 0,
                'riddle_id' => 33,
                'next_riddle_id' => 34,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => '8',
                'points_awarded' => 10,
                'riddle_id' => 33,
                'next_riddle_id' => 34,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'De notre mieux',
                'points_awarded' => 0,
                'riddle_id' => 34,
                'next_riddle_id' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'Toujours prêt.e.s',
                'points_awarded' => 10,
                'riddle_id' => 34,
                'next_riddle_id' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'Killomètre-épars',
                'points_awarded' => 0,
                'riddle_id' => 40,
                'next_riddle_id' => 41,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'Killomètre-effort',
                'points_awarded' => 10,
                'riddle_id' => 40,
                'next_riddle_id' => 41,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'À Interlaken',
                'points_awarded' => 0,
                'riddle_id' => 41,
                'next_riddle_id' => 42,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'À Kandersteg',
                'points_awarded' => 10,
                'riddle_id' => 41,
                'next_riddle_id' => 42,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => '1:100000',
                'points_awarded' => 0,
                'riddle_id' => 42,
                'next_riddle_id' => 43,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => '1:25000',
                'points_awarded' => 10,
                'riddle_id' => 42,
                'next_riddle_id' => 43,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'Oui',
                'points_awarded' => 0,
                'riddle_id' => 43,
                'next_riddle_id' => 44,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'Non',
                'points_awarded' => 10,
                'riddle_id' => 43,
                'next_riddle_id' => 44,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'Statique',
                'points_awarded' => 0,
                'riddle_id' => 44,
                'next_riddle_id' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'Dynamique',
                'points_awarded' => 10,
                'riddle_id' => 44,
                'next_riddle_id' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => '2 heures',
                'points_awarded' => 0,
                'riddle_id' => 50,
                'next_riddle_id' => 51,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => '4 heures',
                'points_awarded' => 10,
                'riddle_id' => 50,
                'next_riddle_id' => 51,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => '7',
                'points_awarded' => 0,
                'riddle_id' => 51,
                'next_riddle_id' => 52,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => '5',
                'points_awarded' => 10,
                'riddle_id' => 51,
                'next_riddle_id' => 52,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'Organisation Mondiale du Mouvement Scout',
                'points_awarded' => 0,
                'riddle_id' => 52,
                'next_riddle_id' => 53,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'Organisation de Marche des Montagnes Suisse',
                'points_awarded' => 10,
                'riddle_id' => 52,
                'next_riddle_id' => 53,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'La Truite',
                'points_awarded' => 0,
                'riddle_id' => 53,
                'next_riddle_id' => 54,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'La Sardine',
                'points_awarded' => 10,
                'riddle_id' => 53,
                'next_riddle_id' => 54,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'Bleue',
                'points_awarded' => 0,
                'riddle_id' => 54,
                'next_riddle_id' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'description' => 'Orange',
                'points_awarded' => 10,
                'riddle_id' => 54,
                'next_riddle_id' => null,
                'created_at' => now(),
                'updated_at' => now()
            ]            
        ]);
    }
}
