<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
class Movies extends Model
{
    use HasFactory;
}
