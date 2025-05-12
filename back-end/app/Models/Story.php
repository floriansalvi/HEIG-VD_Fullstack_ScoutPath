<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    /**
     * The Story model represents a story in the system.
     * It includes attributes like the title and description of the story.
     *
     * - Each story can have many chapters associated with it.
     * - Each story can have multiple progression logs tracking user progress.
     */
    protected $fillable = [
        'title',
        'description'
    ];

    public function chapters() {
        return $this->hasMany(Chapter::class);
    }

    public function progressionLogs() {
        return $this->hasMany(ProgressLog::class);
    }
}
