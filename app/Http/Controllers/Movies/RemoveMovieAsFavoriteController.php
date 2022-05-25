<?php

declare(strict_types=1);

namespace App\Http\Controllers\Movies;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RemoveMovieAsFavoriteController
{
    public function __invoke(int $id, Request $request): RedirectResponse
    {
        $request->user()->favouriteMovies()->detach([$id]);

        return redirect()->route('movies:show', ['id' => $id]);
    }
}