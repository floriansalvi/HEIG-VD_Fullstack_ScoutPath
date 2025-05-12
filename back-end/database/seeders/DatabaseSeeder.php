<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\ProgressLog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'johndoe@scoutpath.ch',
            'password' => Hash::make('Heig2025')
        ]);

        $this->call([
            StorySeeder::class,
            ChapterSeeder::class,
            RiddleSeeder::class,
            ChoiceSeeder::class,
            ProgressLogSeeder::class
        ]);
    }
}
