<?php

namespace App\Services\RecommendationStrategy;

use App\Helpers\RandomIntGenerator;
use Exception;

class ThreeRandomTitles implements RecommendationInterface
{
    public function filterTitles(array $titles): array
    {
        try {
            $titleIds = RandomIntGenerator::getRandomInt(min: 0, max: count($titles) - 1, count: 3);
        } catch (Exception) {
            echo 'An error occurred. Check logs.';
            return [];
        }

        $filteredTitles = [];
        foreach ($titleIds as $id) {
            $filteredTitles[] = $titles[$id];
        }

        //To avoid title duplicates
        if (array_unique($filteredTitles) !== $filteredTitles) {
            return $this->filterTitles($titles);
        }

        return $filteredTitles;
    }
}