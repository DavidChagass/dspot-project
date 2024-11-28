<?php

// Importing necessary classes for application setup and routing
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))  // Configure the base path of the application, setting it to the parent directory
    ->withRouting(  // Setting up the application's routing configuration
        web: __DIR__.'/../routes/web.php',  // Defining the path for the web routes
        commands: __DIR__.'/../routes/console.php',  // Defining the path for the console routes
        health: '/up',  // Defining the route for health checks
    )
    ->withMiddleware(function (Middleware $middleware) {  // Middleware configuration (currently not implemented)
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {  // Exception handling configuration (currently not implemented)
        //
    })
    ->create();  // Finalizes the application setup and creates the application instance
