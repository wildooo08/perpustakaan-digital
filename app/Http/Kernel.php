<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Symfony\Component\Routing\Loader\ProtectedPhpFileLoader;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Auth\Middleware\Authenticate;

class Kernel extends HttpKernel
{
    /**
     * Global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    // protected $middleware = [
    //     // Middleware untuk seluruh aplikasi
    //     \App\Http\Middleware\TrustHosts::class,
    //     \App\Http\Middleware\TrustProxies::class,
    //     \Illuminate\Http\Middleware\HandleCors::class,
    //     \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
    //     \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
    //     \App\Http\Middleware\TrimStrings::class,
    //     \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    // ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    // protected $middlewareGroups = [
    //     'web' => [
    //         \App\Http\Middleware\EncryptCookies::class,
    //         \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
    //         \Illuminate\Session\Middleware\StartSession::class,
    //         \Illuminate\View\Middleware\ShareErrorsFromSession::class,
    //         \App\Http\Middleware\VerifyCsrfToken::class,
    //         \Illuminate\Routing\Middleware\SubstituteBindings::class,
    // //     ],

    //     'api' => [
    //         'throttle:api',
    //         \Illuminate\Routing\Middleware\SubstituteBindings::class,
    //     ],
    // ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \Illuminate\Auth\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,

        // Tambahkan middleware kustom Anda
        'only_admin' => \App\Http\Middleware\OnlyAdmin::class,
    ];
}
