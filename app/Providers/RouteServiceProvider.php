<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $webIndexNameSpace   = 'App\Http\Controllers\WebIndex';
    protected $webIndexDomain      = 'localhost';
    protected $webManagerNameSpace = 'App\Http\Controllers\WebManager';
    protected $webManagerDomain    = 'localhost';
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
     * @return void
     */
    public function map()
    {
        $this->webIndexDomain   = config('app.urlWebIndex');
        $this->webIndexDomain   = json_decode($this->webIndexDomain, true);
        $this->webManagerDomain = config('app.urlWebManager');
        $this->webManagerDomain = json_decode($this->webManagerDomain, true);

        if(empty($_SERVER['HTTP_HOST'])){
            $this->webIndexDomain = 'localhost';
            $this->webManagerDomain = 'localhost';
        }
        else if(is_null($this->webIndexDomain)){
            $this->webIndexDomain = 'localhost';
        }
        else if(is_null($this->webManagerDomain)){
            $this->webManagerDomain = 'localhost';
        }
        else{
            $host = explode(":", $_SERVER['HTTP_HOST'])[0];
            if(in_array($host, $this->webIndexDomain)){
                $this->webIndexDomain = $host;
                $this->mapWebIndexRoutes();
            }
            else if(in_array($host, $this->webManagerDomain)){
                $this->webManagerDomain = $host;
                $this->mapWebManagerRoutes();
            }
            else{
                abort(404);
            }
        }
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebIndexRoutes()
    {
        Route::group([
            'namespace' => $this->webIndexNameSpace,
            'domain'    => $this->webIndexDomain,
        ], function ($router) {
            Route::group([
                'middleware' => 'webIndex',
            ], function ($router) {
                require base_path('routes/webIndex.php');
            });
            Route::group([
                'prefix'    => 'ajax',
                'namespace' => 'ajax',
                'middleware' => 'webIndex',
            ], function ($router) {
                require base_path('routes/webIndex.ajax.php');
            });
        });
    }

    protected function mapWebManagerRoutes()
    {
        Route::group([
            'namespace' => $this->webManagerNameSpace,
            'domain'    => $this->webManagerDomain,
        ], function ($router) {
            Route::group([
                'middleware' => 'webManager',
            ], function ($router) {
                require base_path('routes/webManager.php');
            });
            Route::group([
                'prefix'    => 'ajax',
                'namespace' => 'ajax',
                'middleware' => 'webManager',
            ], function ($router) {
                require base_path('routes/webManager.ajax.php');
            });
        });
    }
}
