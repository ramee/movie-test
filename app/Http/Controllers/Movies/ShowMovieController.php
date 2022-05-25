<?php

declare(strict_types=1);

namespace App\Http\Controllers\Movies;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShowMovieController
{
    public function __invoke(int $id, Request $request): View
    {
        return view('movies.show', [
            'movie' => Movie::with([
                'usersFavored' => function ($query) use ($request) {
                    $query->whereId($request->user()->id);
                }
            ])->find($id),
        ]);
    }
}