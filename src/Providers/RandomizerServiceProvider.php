<?php

namespace Tedon\LaravelRandomizer\Providers;

use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Support\ServiceProvider;
use Tedon\LaravelRandomizer\Randomizer;

class RandomizerServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../../resources/config/laravel-randomizer.php' => config_path('laravel-randomizer.php')
        ], 'randomizer-config');

        AboutCommand::add('Laravel Randomizer', fn() => ['Version' => '0.0.1']);
    }

    public function register(): void
    {
        $this->app->bind('laravel-randomizer', function () {
            return new Randomizer();
        });
    }
}