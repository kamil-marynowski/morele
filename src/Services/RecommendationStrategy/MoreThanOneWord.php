<?php

namespace App\Services\RecommendationStrategy;

use App\Services\RecommendationStrategy\RecommendationInterface;

class MoreThanOneWord implements RecommendationInterface
{
    /**
     * @param array $titles
     * @return array
     */
    public function filterTitles(array $titles): array
    {
        $filteredTitles = array_filter($titles, function ($title) {
            return $title === trim($title) && str_contains($title, ' ');
        });

        return $filteredTitles;
    }
}