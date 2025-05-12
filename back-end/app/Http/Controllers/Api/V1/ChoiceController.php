<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Riddle;
use App\Models\Choice;


use Illuminate\Http\JsonResponse;

class ChoiceController extends Controller
{
    /**
     * Get a list of choices for a specific riddle.
     *
     * @param Riddle $riddle The riddle instance (resolved by route model binding).
     * @return JsonResponse A JSON response containing the choices for the riddle.
     */
    public function index(Riddle $riddle): JsonResponse 
    {  
        $riddle->load(['choices:id,description,points_awarded,riddle_id,next_riddle_id']);

        return response()->json([
            'status' => 'success',
            'data' => $riddle->choices,
        ], 200);
    }

    /**
     * Get details of a specific choice.
     *
     * @param Choice $choice The choice instance (resolved by route model binding).
     * @return JsonResponse A JSON response containing the details of the choice.
     */
    public function show(Choice $choice): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => $choice
        ], 200);
    }
}