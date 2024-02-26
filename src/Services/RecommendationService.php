<?php

declare(strict_types=1);

namespace App\Services;

use App\Services\RecommendationStrategy\RecommendationContext;

class RecommendationService
{
    private function loadMovies()
    {
        return require __DIR__ . '/../../resources/movies.php';
    }

    public function getRecommendations(string $algorithm): array
    {
        $recommendation = new RecommendationContext($algorithm);

        return $recommendation->getRecommendations(titles: $this->loadMovies());
    }
}