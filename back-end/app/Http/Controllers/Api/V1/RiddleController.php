<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Models\Chapter;
use App\Models\Riddle;

class RiddleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Chapter $chapter): JsonResponse {
        
        $chapter->load(['riddles:id,title,description,chapter_id']);

        return response()->json([
            'status' => 'success',
            'data' => $chapter->riddles,
        ], 200);
    }

    public function show(Riddle $riddle): JsonResponse {
        
        $riddle->load(['choices:id,description,points_awarded,riddle_id,next_riddle_id']);

        return response()->json([
            'status' => 'success',
            'data' => [
                'id' => $riddle->id,
                'title' => $riddle->title,
                'description' => $riddle->description,
                'choices' => $riddle->choices,
            ]
        ], 200);
    }
}
