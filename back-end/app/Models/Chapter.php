<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    /**
     * The Chapter model represents a chapter in a story.
     * It includes attributes like title, description, points needed, 
     * and the associated story. The model also defines relationships 
     * with the Story, Riddle, and ProgressLog models.
     * 
     * - Each chapter belongs to a story.
     * - Each chapter can have many riddles and progression logs.
     */
    protected $fillable = [
        'title',
        'description',
        'points_needed',
        'story_id'
    ];

    public function story()
    {
        return $this->belongsTo(Story::class);
    }

    public function riddles() {
        return $this->hasMany(Riddle::class);
    }

    public function progressionLogs() {
        return $this->hasMany(ProgressLog::class);
    }
}
