<?php

namespace Database\Seeders;

use App\Models\ProgressLog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgressLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProgressLog::create([
            'user_id' => 1,
            'story_id' => 1,
            'chapter_id' => 2,
            'riddle_id' => 23,
            'points' => 60
        ]);
    }
}