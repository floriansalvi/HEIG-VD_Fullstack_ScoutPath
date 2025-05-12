<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\ProgressLog;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProgressLogRequest;
use App\Http\Requests\UpdateProgressLogRequest;
use Illuminate\Http\JsonResponse;

class ProgressLogController extends Controller
{
    /**
     * Get a list of progress logs for the authenticated user.
     *
     * @param Request $request The incoming HTTP request.
     * @return JsonResponse A JSON response with the user's progress logs.
     */
    public function index(Request $request): JsonResponse
    {
        $progressLogs = ProgressLog::where('user_id', $request->user()->id)->get();

        return response()->json([
            'status' => 'success',
            'data' => $progressLogs
        ], 200);
    }

    /**
     * Store a new progress log or update an existing one.
     *
     * @param StoreProgressLogRequest $request The validated request data for storing progress logs.
     * @return JsonResponse A JSON response with the created/updated progress log.
     */
    public function store(StoreProgressLogRequest $request): JsonResponse
    {
        $existingProgressLog = ProgressLog::where('user_id', $request->user()->id)
            ->where('story_id', $request->story_id)
            ->first();
        
        if($existingProgressLog){
            // Update existing progress log
            $existingProgressLog->update([
                'chapter_id' => $request->chapter_id,
                'riddle_id' => $request->riddle_id,
                'points' => $request->points
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'La progression a été mise à jour.',
                'data' => $existingProgressLog
            ], 200);
        } else {
            // Create new progress log
            $progressLog = ProgressLog::create([
                'user_id' => $request->user()->id,
                'story_id' => $request->story_id,
                'chapter_id' => $request->chapter_id,
                'riddle_id' => $request->riddle_id,
                'points' => $request->points
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'La progression a été enregistrée.',
                'data' => $progressLog
            ], 201);
        }
    }

    /**
     * Get the progress log for a specific story.
     *
     * @param Request $request The incoming HTTP request.
     * @param int $storyId The ID of the story.
     * @return JsonResponse A JSON response with the user's progress for the story.
     */
    public function show(Request $request, $storyId): JsonResponse
    {
        $progressLog = ProgressLog::where('user_id', $request->user()->id)
            ->where('story_id', $storyId)
            ->first();
        
        if(!$progressLog){
            return response()->json([
                'status' => 'error',
                'message' => 'Aucune progression n\'existe pour cette histoire.'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $progressLog
        ], 200);
    }

    /**
     * Delete the progress log for a specific story.
     *
     * @param Request $request The incoming HTTP request.
     * @param int $storyId The ID of the story.
     * @return JsonResponse A JSON response indicating whether the progress log was deleted.
     */
    public function destroy(Request $request, $storyId): JsonResponse
    {
        $progressLog = ProgressLog::where('user_id', $request->user()->id)
            ->where('story_id', $storyId)
            ->first();
        
        if(!$progressLog){
            return response()->json([
                'status' => 'error',
                'message' => 'Aucune progression n\'existe pour cette histoire.'
            ], 404);
        }

        $progressLog->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'La progression a été supprimée.'
        ], 204);
    }
}
