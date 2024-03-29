<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        config(['app.locale' => 'id' ]);

        Blade::directive('currency', function ( $expression ) { return "Rp. <?php echo number_format($expression, 0,',','.'); ?>"; });

        Paginator::useBootstrap();

        Gate::define('admin', function(User $user) {
            return $user->username === 'fajrin';
        });
    }
}
