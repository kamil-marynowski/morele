<?php

declare(strict_types=1);

namespace App\Services\RecommendationStrategy;

class MoviesBeginWithWAndHaveEvenNumberOfCharacters implements RecommendationInterface
{
    /**
     * @param array $titles
     * @return array
     */
    public function filterTitles(array $titles): array
    {
        $filteredTitles = array_filter($titles, function ($title) {
            return str_starts_with(strtolower($title), 'w') && !((strlen($title) & 2));
        });

        return $filteredTitles;
    }
}