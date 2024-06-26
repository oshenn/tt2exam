<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Observers\AdminActions;
use App\Models\Aircraft;
use App\Models\Event;
use App\Models\Comment;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('admin', function ($user) {
            return $user->hasRole('Administrator');
        });

        Aircraft::observe(AdminActions::class);
        Event::observe(AdminActions::class);
        Comment::observe(AdminActions::class);
    }
}
