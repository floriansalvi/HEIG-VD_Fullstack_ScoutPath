<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Models\Story;



class StoryController extends Controller
{
    public function index(): JsonResponse {
        $stories = Story::all();
        return response()->json([
            'status' => 'success',
            'data' => $stories
        ], 200);
    }

    public function show(Story $story): JsonResponse {
        $story->load(['chapters:id,title,description,points_needed,story_id']);

        return response()->json([
            'status' => 'success',
            'data' => [
                'id' => $story->id,
                'title' => $story->title,
                'description' => $story->description,
                'chapters' => $story->chapters,
            ]
        ], 200);
    }
}
