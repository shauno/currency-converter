<?php

namespace Mukuru\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class MukuruServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        /*
         * Please note, normally it would be a good idea to add a level of abstraction to Guzzle, so we could
         * instantiate more than 1 instance with different configs each time, but this will do for this example
         */
        $this->app->bind('GuzzleHttp\Client', function () {
            return new Client([
                'base_uri' => 'http://www.apilayer.net',
            ]);
        });
    }
}
