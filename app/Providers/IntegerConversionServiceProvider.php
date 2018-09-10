<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class IntegerConversionServiceProvider extends ServiceProvider
{


    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('IntegerConversionInterface', 'IntegerConversion');
    }
}
