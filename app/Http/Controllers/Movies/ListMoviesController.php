<?php

declare(strict_types=1);

namespace App\Http\Controllers\Movies;

use App\Models\Movie;
use Illuminate\View\View;

class ListMoviesController
{
    public function __invoke(): View
    {
        return view('movies.list', ['list' => Movie::paginate(20)]);
    }
}