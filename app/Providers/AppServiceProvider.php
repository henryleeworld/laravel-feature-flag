<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\ServiceProvider;
use Laravel\Pennant\Feature;
use Laravel\Pennant\Middleware\EnsureFeaturesAreActive;

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
        EnsureFeaturesAreActive::whenInactive(function (Request $request, array $features) {
            // return new Response(status: 403);
            abort(403);
        });
        Feature::define('initialization', fn (User|null $user) => match (true) {
            $user === null => true,
        });
        Feature::activate('initialization');
        // Feature::someAreActive('initialization');
        // Feature::deactivate('initialization');
    }
}
