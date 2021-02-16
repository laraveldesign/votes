<?php

namespace Laraveldesign\Votes;

use Illuminate\Support\ServiceProvider;
use Laraveldesign\Votes\Livewire\StarVotes;
use Livewire\Livewire;

class VotesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
         $this->loadViewsFrom(__DIR__.'/../resources/views', 'votes');
         $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
         Livewire::component('star-votes',StarVotes::class);

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/views' => $this->app->resourcePath('views/vendor/votes'),
            ], 'votes:views');

        }
    }
}
