<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/admin';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }
    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();

        $this->mapApiRoutes();

        $this->mapPostsRoutes();

        $this->mapUsersRoutes();

        $this->mapRolesRoutes();

        $this->mapPermissionsRoutes();
        
        $this->mapSubjectsRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/web.php'));
    }

    protected function mapApiRoutes() {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api/api.php'));
    }

    protected function mapPostsRoutes() {
        Route::prefix('admin')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/posts.php'));
    }

    protected function mapUsersRoutes() {
        Route::prefix('admin')
            ->middleware(['web' , 'auth' , 'role:admin'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web/users.php'));
    }

    protected function mapRolesRoutes() {
        Route::prefix('admin')
            ->middleware(['web' , 'auth' , 'role:admin'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web/roles.php'));
    }

    protected function mapPermissionsRoutes() {
        Route::prefix('admin')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/permission.php'));
    }
    protected function mapSubjectsRoutes() {
        Route::prefix('admin')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/subjects.php'));
    }
}
