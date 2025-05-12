<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

use App\Http\Controllers\Api\V1\StoryController;
use App\Http\Controllers\Api\V1\ChapterController;
use App\Http\Controllers\Api\V1\RiddleController;
use App\Http\Controllers\Api\V1\ChoiceController;
use App\Http\Controllers\Api\V1\ProgressLogController;

// Register a new user (create account)
Route::post('/register',[RegisteredUserController::class, 'store']);

// Log in an existing user (start session)
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Log out the user (destroy session)
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);

// Get the authenticated user's information (requires authentication)
Route::middleware('auth:sanctum')->get('/user', fn(Request $request) => $request->user());

// Prefix 'v1': This line sets a prefix for all the routes that follow, 
// grouping the routes of version 1 of the API under the '/v1' prefix.
Route::prefix('v1')->group(function(){

    // Public route to get all stories
    Route::get('/stories', [StoryController::class, 'index']);

    Route::get('test/riddles/{riddle}/choices', [ChoiceController::class, 'index']);

     // Group of routes that require user to be authenticated (using Sanctum)
    Route::middleware('auth:sanctum')->group(function(){
       
        // Get details of a specific story
        Route::get('/stories/{story}', [StoryController::class, 'show']);

        // Get chapters related to a specific story
        Route::get('/stories/{story}/chapters', [ChapterController::class, 'index']);
        Route::get('/chapters/{chapter}', [ChapterController::class, 'show']);

        // Get riddles related to a specific chapter
        Route::get('/chapters/{chapter}/riddles', [RiddleController::class, 'index']);
        Route::get('/riddles/{riddle}', [RiddleController::class, 'show']);

        // Get choices related to a specific riddle
        Route::get('/riddles/{riddle}/choices', [ChoiceController::class, 'index']);
        Route::get('/choices/{choice}', [ChoiceController::class, 'show']);

        // Routes to manage user progress in the story
        Route::get('/progress', [ProgressLogController::class, 'index']);
        Route::get('/progress/{storyId}', [ProgressLogController::class, 'show']);
        Route::post('/progress', [ProgressLogController::class, 'store']);
        Route::delete('/progress/{storyId}', [ProgressLogController::class, 'destroy']);
    });
});
