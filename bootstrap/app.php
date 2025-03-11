<?php

<<<<<<< HEAD
=======
use App\Http\Middleware\AdminAuthenticate;
>>>>>>> 3a7c11c0f7c26e882b2a588b74bda85988f62f2b
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
<<<<<<< HEAD
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
=======
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // $middleware->add(AdminAuthenticate::class);
        $middleware->alias([
            'auth.admin' => \App\Http\Middleware\AdminAuthenticate::class,
        ]);
>>>>>>> 3a7c11c0f7c26e882b2a588b74bda85988f62f2b
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
