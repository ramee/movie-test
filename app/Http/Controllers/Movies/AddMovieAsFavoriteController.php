<?php

declare(strict_types=1);

namespace App\Http\Controllers\Movies;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AddMovieAsFavoriteController
{
    public function __invoke(int $id, Request $request): RedirectResponse
    {
        $request->user()->favouriteMovies()->syncWithoutDetaching([$id]);

        return redirect()->route('movies:show', ['id' => $id]);
    }
}