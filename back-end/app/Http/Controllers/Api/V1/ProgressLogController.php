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
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $progressLogs = ProgressLog::where('user_id', $request->user()->id)->get();

        return response()->json([
            'status' => 'success',
            'data' => $progressLogs
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProgressLogRequest $request)
    {
        $existingProgressLog = ProgressLog::where('user_id', $request->user()->id)
            ->where('story_id', $request->story_id)
            ->first();
        
        if($existingProgressLog){
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
     * Display the specified resource.
     */
    public function show(Request $request, $storyId)
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
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $storyId)
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
