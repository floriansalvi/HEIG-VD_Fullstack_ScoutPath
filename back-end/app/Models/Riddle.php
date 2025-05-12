<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riddle extends Model
{
    use HasFactory;

    /**
     * The Riddle model represents a riddle in a chapter.
     * It includes attributes like the title, description, and the associated chapter ID.
     *
     * - Each riddle belongs to a chapter.
     * - Each riddle can have many choices associated with it.
     * - Each riddle can lead to other riddles through the choices (next_riddles).
     * - Each riddle can have multiple progression logs tracking user progress.
     */
    protected $fillable = [
        'title',
        'description',
        'chapter_id'
    ];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }
    
    public function choices() {
        return $this->hasMany(Choice::class);
    }

    public function nextRiddles()
        {
        return $this->hasManyThrough(
        Riddle::class,
        Choice::class,
        'riddle_id',        
        'id',              
        'id',               
        'next_riddle_id'
        );
    }

    public function progressionLogs() {
        return $this->hasMany(ProgressLog::class);
    }
}
