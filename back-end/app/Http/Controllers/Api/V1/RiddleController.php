<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Riddle;
use App\Http\Requests\StoreRiddleRequest;
use App\Http\Requests\UpdateRiddleRequest;

class RiddleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Riddle::with(['chapters', 'choices'])->get(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRiddleRequest $request)
    {
        $riddle = Riddle::create($request->validated());
        return response()->json($riddle, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Riddle $riddle)
    {
        $riddle->load(['chapters', 'choices']);
        return response()->json($riddle, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRiddleRequest $request, Riddle $riddle)
    {
        $riddle->update($request->validated());
        return response()->json($riddle, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Riddle $riddle)
    {
        $riddle->delete();
        return response()->json(['message' => 'L\'énigme a été supprimée.'], 200);
    }
}
