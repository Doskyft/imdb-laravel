<?php

namespace App\Providers;

use App\Models\Actor;
use App\Models\Gender;
use App\Models\Movie;
use App\Policies\ActorPolicy;
use App\Policies\GenderPolicy;
use App\Policies\MoviePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Movie::class => MoviePolicy::class,
        Actor::class => ActorPolicy::class,
        Gender::class => GenderPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
