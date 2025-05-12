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

// Inscriptiobn d'un nouveau user
Route::post('/register',[RegisteredUserController::class, 'store']);

// Connexion du user
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Déconnexion du user
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);

// Récupère les informations du user connecté
Route::middleware('auth:sanctum')->get('/user', fn(Request $request) => $request->user());

//

Route::prefix('v1')->group(function(){

    // Route publique permettant de récupérer toutes les Stories
    Route::get('/stories', [StoryController::class, 'index']);

    Route::get('test/riddles/{riddle}/choices', [ChoiceController::class, 'index']);

    // Routes nécessitant que le user soit connecté
    Route::middleware('auth:sanctum')->group(function(){
       
        Route::get('/stories/{story}', [StoryController::class, 'show']);

        Route::get('/stories/{story}/chapters', [ChapterController::class, 'index']);
        Route::get('/chapters/{chapter}', [ChapterController::class, 'show']);

        Route::get('/chapters/{chapter}/riddles', [RiddleController::class, 'index']);
        Route::get('/riddles/{riddle}', [RiddleController::class, 'show']);

        Route::get('/riddles/{riddle}/choices', [ChoiceController::class, 'index']);
        Route::get('/choices/{choice}', [ChoiceController::class, 'show']);

        Route::get('/progress', [ProgressLogController::class, 'index']);
        Route::get('/progress/{storyId}', [ProgressLogController::class, 'show']);
        Route::post('/progress', [ProgressLogController::class, 'store']);
        Route::delete('/progress/{storyId}', [ProgressLogController::class, 'destroy']);
    });
});
