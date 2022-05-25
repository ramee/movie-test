<?php

namespace App\Console\Commands;

use App\Service\ImportTmdbMoviesService;
use Illuminate\Console\Command;

class ImportTmbdMovies extends Command
{
    protected $signature = 'import:tmdb-movies';

    protected $description = 'Import TMDB movies';

    public function handle(ImportTmdbMoviesService $service): int
    {
        $this->info('Starting import...');

        $service->import();

        return 0;
    }
}
