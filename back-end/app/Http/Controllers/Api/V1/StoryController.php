<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Models\Story;



class StoryController extends Controller
{
    /**
     * Get a list of all stories.
     *
     * @return JsonResponse A JSON response with all stories.
     */
    public function index(): JsonResponse {
        $stories = Story::all();
        return response()->json([
            'status' => 'success',
            'data' => $stories
        ], 200);
    }

    /**
     * Get details of a specific story.
     *
     * @param Story $story The story instance (resolved by route model binding).
     * @return JsonResponse A JSON response with story details and chapters.
     */
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
