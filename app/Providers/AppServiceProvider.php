<?php

namespace App\Providers;

use App\Domains\SMS\Contracts\SMSClientInterface;
use App\Domains\SMS\Services\SMSService;
use App\Domains\SMS\Services\TwilioClient;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SMSClientInterface::class, TwilioClient::class);
        $this->app->bind(SMSService::class, function (Application $app) {
            return new SMSService($app->make(SMSClientInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
