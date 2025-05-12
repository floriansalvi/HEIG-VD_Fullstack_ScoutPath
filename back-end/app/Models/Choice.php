<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    use HasFactory;

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
