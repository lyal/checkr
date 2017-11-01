<?php

namespace Lyal\Checkr\Laravel;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Lyal\Checkr\Client;
use Lyal\Checkr\Laravel\Http\Middleware\Webhook;


class CheckrServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/Routes/api.php');
        $this->publishes([
            __DIR__ . '/Config/checkr.php' => config_path('checkr.php'),
        ]);
    }

    public function register()
    {
        $this->app['router']->aliasMiddleware('checkr_webhook', Webhook::class);


        $this->app->bind('lyal.checkr', function () {
            $key = App::environment('production') ? env('checkr_production_key') : env('CHECKR_TESTING_KEY', null) ?? config('checkr_testing_key');
            return new Client($key, env('checkr_options', []));
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Client::class];
    }
}