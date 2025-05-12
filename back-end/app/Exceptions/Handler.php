<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class Handler extends ExceptionHandler
{
    /**
     * Report the exception.
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render the exception response.
     */
    public function render($request, Throwable $exception)
    {
        // Handle the ModelNotFoundException (related to model binding)
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
