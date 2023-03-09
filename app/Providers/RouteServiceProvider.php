<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/admin';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web/web.php'));
        });

        $this->mapProjectsRoute();

        $this->mapUsersRoute();

        $this->mapRolesRoute();

        $this->mapPermissionsRoute();

        $this->mapProject_CategoriesRoute();
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }

    protected function mapProjectsRoute() 
    {
        Route::prefix('admin')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/projects.php'));
    }

    protected function mapUsersRoute() 
    {
        Route::prefix('admin')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/users.php'));
    }

    protected function mapRolesRoute() 
    {
        Route::prefix('admin')
            ->middleware(['web', 'auth', 'role:admin'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web/roles.php'));
    }

    protected function mapPermissionsRoute() 
    {
        Route::prefix('admin')
            ->middleware(['web', 'auth', 'role:admin'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web/permissions.php'));
    }

    protected function mapProject_CategoriesRoute() 
    {
        Route::prefix('admin')
            ->middleware(['web', 'auth', 'role:admin'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web/project_categories.php'));
    }
}
