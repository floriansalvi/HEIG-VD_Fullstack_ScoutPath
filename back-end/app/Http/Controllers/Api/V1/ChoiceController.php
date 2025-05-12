<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Riddle;
use App\Models\Choice;


use Illuminate\Http\JsonResponse;

class ChoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Riddle $riddle): JsonResponse {
        
        $riddle->load(['choices:id,description,points_awarded,riddle_id,next_riddle_id']);

        return response()->json([
            'status' => 'success',
            'data' => $riddle->choices,
        ], 200);
    }

    public function show(Choice $choice): JsonResponse {

        return response()->json([
            'status' => 'success',
            'data' => $choice
        ], 200);
    }
}