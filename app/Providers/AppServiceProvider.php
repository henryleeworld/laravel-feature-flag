<?php

namespace App\Providers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
// use Illuminate\Support\Lottery;
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
        // Feature::define('tasks-management', function (User $user) {
            // return (bool)$user->is_premium;

            // return app()->environment('local');

            // return $user->email == 'admin@admin.com';

            // return Lottery::odds(1, 5);
        // });
        Feature::define('initialization', function (User $user) {
            return true;
        });

        Feature::define('tasks-management', function (Team $team) {
            return $team->id == 1;
        });

        Feature::define('team-label', fn (User $user) => Arr::random([
            __('Public'),
            __('Confidential'),
            __('Private'),
        ]));

        EnsureFeaturesAreActive::whenInactive(
            function (Request $request, array $features) {
                abort(403);
            }
        );
    }
}
