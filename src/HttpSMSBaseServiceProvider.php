<?php


namespace Durranilab\Httpsms;


use Illuminate\Support\ServiceProvider;

class HttpSMSBaseServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/smsconfig.php' => config_path('smsconfig.php'),
            ], 'sms-config');
        }

    }

    public function register()
    {
        $this->app->singleton('HttpSMS', function () {
            return new HttpSMS();
        });
    }
}