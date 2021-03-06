<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \App\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        \App\Http\Middleware\TrustProxies::class,

    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'noHayUser' => \App\Http\Middleware\NoHayUsuario::class,
        'noHayCarpeta' => \App\Http\Middleware\NoHayCarpeta::class,
        'noHayFormE' => \App\Http\Middleware\NoHayFormE::class,
        'noHayFormF' => \App\Http\Middleware\NoHayFormF::class,
        'faltaCompletarCarpeta' => \App\Http\Middleware\FaltaCompletarCarpeta::class,
        'noHayEjeA' => \App\Http\Middleware\NoHayEjeA::class,
        'noHayEjeB' => \App\Http\Middleware\NoHayEjeB::class,
        'noHayEjeC' => \App\Http\Middleware\NoHayEjeC::class,
        'noHayEjeD' => \App\Http\Middleware\NoHayEjeD::class,
        'noHayEjeE' => \App\Http\Middleware\NoHayEjeE::class,
        'noHayEjeF' => \App\Http\Middleware\NoHayEjeF::class,
        'faltaCompletarEje' => \App\Http\Middleware\FaltaCompletarEje::class,
        'soloLectura' => \App\Http\Middleware\SoloLectura::class,
        'victimaNoEs' => \App\Http\Middleware\VictimaNoEs::class,
        'victimaDesconoce' => \App\Http\Middleware\VictimaDesconoce::class,
        'puedeContinuar' => \App\Http\Middleware\PuedeContinuar::class,
        //ruta admin protegida
        'admin' => \App\Http\Middleware\IsAdmin::class,
    ];
}
