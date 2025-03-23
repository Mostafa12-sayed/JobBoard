<?php

use App\Http\Middleware\AdminAuthenticate;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // $middleware->add(AdminAuthenticate::class);
        // $middleware->add(AdminAuthenticate::class);
        // $middleware->append(AdminAuthenticate::class);


        $middleware->alias([
            'admin.login' => AdminAuthenticate::class,
        ]);
        $middleware->alias([
            'check.user.type' => \App\Http\Middleware\CheckTypeUser::class,
            'filter.badwords' => \App\Http\Middleware\FilterBadWords::class,

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
