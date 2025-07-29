<?php

use App\Http\Resources\BaseResource;
use Illuminate\Foundation\Application;
use Illuminate\Database\QueryException;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Database\Eloquent\ModelNotFoundException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (Throwable $e, $request) {
            if ($request->is('api/*') || $request->expectsJson()) {
                $statusCode = 500;
                $errors = null;

                if ($e instanceof ValidationException) {
                    $statusCode = 422;
                    $errors = $e->errors();
                } elseif ($e instanceof AuthenticationException) {
                    $statusCode = 401;
                } elseif ($e instanceof ModelNotFoundException) {
                    $statusCode = 404;
                } elseif ($e instanceof QueryException) {
                    $statusCode = $e->errorInfo[1] == 1062 ? 409 : 500;
                } elseif (method_exists($e, 'getStatusCode')) {
                    $statusCode = $e->getStatusCode();
                }

                $errorData = $e->getMessage();
                if ($errors !== null) {
                    $errorData = [
                        'message' => $e->getMessage(),
                        ...$errors
                    ];
                }

                return BaseResource::error($errorData, $statusCode);
            }

            return null;
        });
    })->withSchedule(function (Schedule $schedule) {
        $schedule->command('sanctum:prune-expired --hours=12')->daily();
    })->create();
