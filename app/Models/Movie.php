<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $title
 * @property string $director
 * @property string $description
 * @property string $photo_url
 * @property int $year
 * @property int|null $provider
 * @property int|null $providerId
 */
class Movie extends Model
{
    use HasFactory;

    public function usersFavored(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class, 'user_movie', 'movie_id', 'user_id');
    }
}
