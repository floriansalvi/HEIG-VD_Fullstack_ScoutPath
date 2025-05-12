<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class Handler extends ExceptionHandler
{
    /**
     * Enregistrer les rapports d'exception.
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Rendre la réponse pour l'exception donnée.
     */
    public function render($request, Throwable $exception)
    {
        // Gérer l'exception ModelNotFoundException (liée au model binding)
        if ($exception instanceof ModelNotFoundException) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'La ressource demandée est introuvable.',
                ], 404);
            }
        }

        return parent::render($request, $exception);
    }
}
