<?php

declare(strict_types=1);

namespace App\Http\Controllers\Movies;

use Illuminate\Http\Request;
use Illuminate\View\View;

class FavouriteMoviesController
{
    public function __invoke(Request $request): View
    {
        return view('movies.list', [
            'list' => $request->user()->favouriteMovies()->paginate(20),
            'title' => __('Favourite Movies'),
        ]);
    }
}