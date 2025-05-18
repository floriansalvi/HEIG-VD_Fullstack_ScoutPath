<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Models\Chapter;
use App\Models\Riddle;

class RiddleController extends Controller
{
    /**
     * Get a list of riddles for a specific chapter.
     *
     * @param Chapter $chapter The chapter instance (resolved by route model binding).
     * @return JsonResponse A JSON response with the riddles of the chapter.
     */
    public function index(Chapter $chapter): JsonResponse {
        
        $chapter->load(['riddles:id,title,description,chapter_id']);

        return response()->json([
            'status' => 'success',
            'data' => $chapter->riddles,
        ], 200);
    }

    /**
     * Get details of a specific riddle.
     *
     * @param Riddle $riddle The riddle instance (resolved by route model binding).
     * @return JsonResponse A JSON response with riddle details and choices.
     */
    public function show(Riddle $riddle): JsonResponse {
        
        $riddle->load(['choices:id,description,points_awarded,riddle_id,next_riddle_id']);

        return response()->json([
            'status' => 'success',
            'data' => [
                'id' => $riddle->id,
                'title' => $riddle->title,
                'description' => $riddle->description,
                'chapter_id' => $riddle->chapter_id,
                'story_id' => $riddle->chapter->story_id,
                'choices' => $riddle->choices,
            ]
        ], 200);
    }
}
