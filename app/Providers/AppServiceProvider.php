<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use League\Fractal\Manager;
use League\Fractal\Serializer\ArraySerializer;
use League\Fractal\Serializer\DataArraySerializer;
use League\Fractal\Serializer\JsonApiSerializer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Global fractal data serializer
        $this->app->bind('League\Fractal\Manager', function($app) {
            $fractal = new Manager;
//             $fractal->setSerializer(new JsonApiSerializer(env('APP_URL', 'http://local.oroundocmsapi.com') . env('API_PREFIX')));
            $fractal->setSerializer(new DataArraySerializer());
            return $fractal;
        });
    }
}
