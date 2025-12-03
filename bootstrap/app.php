<?php

use Illuminate\Foundation\Application;
use App\Http\Middleware\LoggedinLibrarian;
use App\Http\Middleware\LoginCheckingLibrarian;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {

        $middleware->alias([
            'LoggedinLibrarianMiddleware' => LoggedinLibrarian::class,
            'auth.librarian.check' => LoginCheckingLibrarian::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
