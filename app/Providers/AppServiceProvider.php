<?php

namespace App\Providers;

use App\Service\ImportTmdbMoviesService;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ImportTmdbMoviesService::class, function () {
            return new ImportTmdbMoviesService(
                config('tmdb.api_host'),
                config('tmdb.api_key'),
                config('tmdb.image_host'),
                $this->app->make(Client::class),
            );
        });
    }

    public function boot(): void
    {
        //
    }
}
