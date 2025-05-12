<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Models\Chapter;
use App\Models\Story;


class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Story $story): JsonResponse {
        
        $story->load(['chapters:id,title,description,points_needed,story_id']);

        return response()->json([
            'status' => 'success',
            'data' => $story->chapters,
        ], 200);
    }

    public function show(Chapter $chapter): JsonResponse {
        
        $chapter->load(['riddles:id,title,description,chapter_id']);

        return response()->json([
            'status' => 'success',
            'data' => [
                'id' => $chapter->id,
                'title' => $chapter->title,
                'description' => $chapter->description,
                'points_needed' => $chapter->points_needed,
                'riddles' => $chapter->riddles,
            ]
        ], 200);
    }
}
