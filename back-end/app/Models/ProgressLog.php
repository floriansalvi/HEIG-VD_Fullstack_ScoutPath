<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'story_id',
        'chapter_id',
        'riddle_id',
        'points'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function story() {
        return $this->belongsTo(Story::class);
    }

    public function chapter() {
        return $this->belongsTo(Chapter::class);
    }

    public function riddle() {
        return $this->belongsTo(Riddle::class);
    }

    public function findByUserAndStory($userId, $storyId){
        return self::where('user_id', $userId)
            ->where('story_id', $storyId)
            ->first();
    }
}
