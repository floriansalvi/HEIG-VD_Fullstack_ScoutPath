<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riddle extends Model
{
    use HasFactory;

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
