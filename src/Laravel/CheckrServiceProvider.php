<?php

namespace Lyal\Checkr\Laravel;

use GuzzleHttp\Client as Guzzle;
use Illuminate\Support\ServiceProvider;
use Lyal\Checkr\Client;
use PullRequest\Checkr\Http\Middleware\Webhook;


class CheckrServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/Routes/api.php');
    }

    public function register()
    {
        $this->app['router']->aliasMiddleware('checkr_webhook', Webhook::class);
        $this->app->bind('lyalt.checkr', function () {
            return new Client(new Guzzle);
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