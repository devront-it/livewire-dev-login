<?php

namespace Devront\DevLogin;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class DevLoginServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/livewire-dev-login.php', 'livewire-dev-login');
        $this->loadViewsFrom(__DIR__ . '/views', 'dev-login');
    }

    public function boot()
    {
        Livewire::component('dev-login::dev-login', DevLogin::class);

        $this->publishes([
            __DIR__ . '/../config/livewire-dev-login.php' => config_path('livewire-dev-login.php')
        ], 'livewire-dev-login-config');

    }
}
