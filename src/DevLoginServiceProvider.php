<?php

namespace Devront\DevLogin;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class DevLoginServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'dev-login');
    }

    public function boot()
    {
        Livewire::component('dev-login::dev-login', DevLogin::class);
    }
}
