<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    use HasFactory;

    /**
     * The Choice model represents a choice for a riddle.
     * It includes attributes like the description of the choice,
     * points awarded for the choice, the associated riddle, and the next riddle ID.
     *
     * - Each choice belongs to a riddle.
     * - Each choice may lead to another riddle, represented by the next_riddle_id.
     */
    protected $fillable = [
        'description',
        'points_awarded',
        'riddle_id',
        'next_riddle_id'
    ];

    public function riddle()
    {
        return $this->belongsTo(Riddle::class);
    }
    
    public function nextRiddle() {
        return $this->belongsTo(Riddle::class, 'next_riddle_id');
    }
}
