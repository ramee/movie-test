<?php

declare(strict_types=1);

namespace App\Service;

use App\Enum\MovieDataProvider;
use App\Models\Movie;
use Carbon\Carbon;
use GuzzleHttp\Client;

class ImportTmdbMoviesService
{
    private string $apiHost;
    private string $apiKey;
    private string $imageHost;
    private Client $httpClient;

    public function __construct(string $apiHost, string $apiKey, string $imageHost, Client $httpClient)
    {
        $this->apiHost = $apiHost;
        $this->apiKey = $apiKey;
        $this->imageHost = $imageHost;
        $this->httpClient = $httpClient;
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     */
    public function import(): void
    {
        // TODO: it is a naiv solution. Refactor it with checking entities individually and update if entity exists
        Movie::truncate();

        $movieListUrls = [
            sprintf('%s/movie/top_rated?api_key=%s&page=1', $this->apiHost, $this->apiKey),
            sprintf('%s/movie/top_rated?api_key=%s&page=2', $this->apiHost, $this->apiKey),
            sprintf('%s/movie/top_rated?api_key=%s&page=3', $this->apiHost, $this->apiKey),
            sprintf('%s/movie/top_rated?api_key=%s&page=4', $this->apiHost, $this->apiKey),
            sprintf('%s/movie/top_rated?api_key=%s&page=5', $this->apiHost, $this->apiKey),
        ];

        $now = new Carbon();

        foreach ($movieListUrls as $movieListUrl) {
            $movies = [];
            $movieListResponse = $this->httpClient->get($movieListUrl);
            $movieListJsonData = json_decode(
                $movieListResponse->getBody()->getContents(),
                false,
                512,
                JSON_THROW_ON_ERROR
            );
            foreach ($movieListJsonData->results as $tmdbMovieData) {
                $movieCreditUrl = sprintf(
                    '%s/movie/%d/credits?api_key=%s',
                    $this->apiHost,
                    $tmdbMovieData->id,
                    $this->apiKey
                );
                $movieCreditResponse = $this->httpClient->get($movieCreditUrl);
                $movieCreditJsonData = json_decode(
                    $movieCreditResponse->getBody()->getContents(),
                    false,
                    512,
                    JSON_THROW_ON_ERROR
                );
                $directorNames = array_map(function ($person) {
                    return $person->name;
                },
                    array_filter($movieCreditJsonData->crew, static function ($person) {
                        return $person->job === 'Director';
                    }));

                $movie = [];
                $movie['title'] = $tmdbMovieData->title;
                $movie['director'] = implode(',', $directorNames);
                $movie['description'] = $tmdbMovieData->overview;
                $movie['photo_url'] = sprintf('%s/%s', $this->imageHost, $tmdbMovieData->poster_path);
                $movie['year'] = (new Carbon($tmdbMovieData->release_date))->year;
                $movie['provider'] = MovieDataProvider::TMDB;
                $movie['provider_id'] = $tmdbMovieData->id;
                $movie['created_at'] = $now;
                $movie['updated_at'] = $now;

                $movies[] = $movie;
            }
            Movie::insert($movies);
        }
    }
}