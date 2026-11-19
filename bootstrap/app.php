
<?php

use App\Http\Controllers\ApiController;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

$apiResponser = new ApiController();

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
    ->withExceptions(function (Exceptions $exceptions) use ($apiResponser) {

        // Authentication Error
        $exceptions->render(function (
            AuthenticationException $ex,
            $request
        ) use ($apiResponser) {
            if ($request->is('api/*')) {
                return $apiResponser->errorResponse(
                    [],
                    401,
                    'Unauthenticated.'
                );
            }
        });

        // Validation Error
        $exceptions->render(function (
            ValidationException $ex,
            $request
        ) use ($apiResponser) {
            if ($request->is('api/*')) {
                return $apiResponser->errorResponse(
                    $ex->errors(),
                    422,
                    'Validation failed.'
                );
            }
        });

        // Duplicate Data Error
        $exceptions->render(function (
            UniqueConstraintViolationException $ex,
            $request
        ) use ($apiResponser) {
            if ($request->is('api/*')) {
                return $apiResponser->errorResponse(
                    [],
                    409,
                    'Duplicate data.'
                );
            }
        });

        // Not Found Error
        $exceptions->render(function (
            NotFoundHttpException $ex,
            $request
        ) use ($apiResponser) {
            if ($request->is('api/*')) {
                return $apiResponser->errorResponse(
                    [],
                    404,
                    'Resource not found.'
                );
            }
        });

        // Method Not Allowed
        $exceptions->render(function (
            MethodNotAllowedHttpException $ex,
            $request
        ) use ($apiResponser) {
            if ($request->is('api/*')) {
                return $apiResponser->errorResponse(
                    [],
                    405,
                    'Method not allowed.'
                );
            }
        });
    })
    ->create();
