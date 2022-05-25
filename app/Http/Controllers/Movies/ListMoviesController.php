<?php

declare(strict_types=1);

namespace App\Http\Controllers\Movies;

use Illuminate\View\View;

class ListMoviesController
{
    public function __invoke(): View
    {
        return view('movies.list');
    }
}