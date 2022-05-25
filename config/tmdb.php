<?php

declare(strict_types=1);

return [
  'api_host' => env('TMDB_API_HOST', 'https://api.themoviedb.org/3'),
  'api_key' => env('TMDB_API_KEY', ''),
  'image_host' => env('TMDB_IMAGE_HOST', 'https://image.tmdb.org/t/p/w500'),
];
