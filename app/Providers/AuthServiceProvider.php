<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Consultation;
use App\Models\HealthSurveillance;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('update-consultation', function (User $user, Consultation $consultation) {
            if ($user->isAdmin()) {
                return true;
            } elseif ($user->isUser()) {

                return $user->id === $consultation->user_id;
            }
        });

        Gate::define('delete-consultation', function (User $user, Consultation $consultation) {
            if ($user->isAdmin()) {
                return true;
            } elseif ($user->isUser()) {

                return $user->id === $consultation->user_id;
            }
        });

        Gate::define('delete-health', function (User $user, HealthSurveillance $health) {
            if ($user->isAdmin()) {
                return true;
            } elseif ($user->isUser()) {

                return $user->id === $health->user_id;
            }
        });
    }
}
