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
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Fruitcake\Cors\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
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
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        'signedhttps' => \App\Http\Middleware\ValidateHttpsSignature::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'statusCheck' => \App\Http\Middleware\CheckStatus::class,
        'EmailVerify' => \App\Http\Middleware\EmailVerify::class,
        'ClinicValidate' => \App\Http\Middleware\ClinicValidate::class,
        'PatientValidate' => \App\Http\Middleware\PatientValidate::class,
        'PhysicianValidate' => \App\Http\Middleware\PhysicianValidate::class,
        'StaffValidate' => \App\Http\Middleware\StaffValidate::class,
        'StaffValidate1' => \App\Http\Middleware\StaffValidate1::class,
        'ClinicAdmin' => \App\Http\Middleware\ClinicAdminRole::class,
        'SystemAdmin' => \App\Http\Middleware\SystemAdminRole::class,
        'Physician' => \App\Http\Middleware\PhysicianRole::class,
        'Patient' => \App\Http\Middleware\PatientRole::class,
        'Staff' => \App\Http\Middleware\StaffRole::class,
        'firstSub' => \App\Http\Middleware\FirstSubscription::class,
        'resubscribeAccess' => \App\Http\Middleware\ResubscribeAccess::class,
        'changeSubAdmin' => \App\Http\Middleware\ChangeSubAdmin::class,
        'editClinicCheck' => \App\Http\Middleware\EditClinic::class,
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
    ];
}
