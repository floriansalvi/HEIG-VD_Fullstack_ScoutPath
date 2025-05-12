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
        // Insert a new user in the database
        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'johndoe@scoutpath.ch',
            'password' => Hash::make('Heig2025')
        ]);

        // Execute the seeders to insert data into the database
        $this->call([
            StorySeeder::class,
            ChapterSeeder::class,
            RiddleSeeder::class,
            ChoiceSeeder::class,
            ProgressLogSeeder::class
        ]);
    }
}
