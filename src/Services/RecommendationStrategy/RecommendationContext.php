<?php

namespace App\Services\RecommendationStrategy;

use Exception;

class RecommendationContext
{
    private $strategy;

    public function __construct(string $strategy)
    {
        $strategyClass = '\\App\\Services\\RecommendationStrategy\\' . $strategy;
        if (class_exists($strategyClass)) {
            $this->strategy = new $strategyClass();
        } else {
            $this->strategy = new WrongAlgorithmName();
        }
    }

    /**
     * Returns unique movie titles in array
     *
     * @param array $titles
     * @return array
     */
    public function getRecommendations(array $titles): array
    {
        return array_unique($this->strategy->filterTitles($titles));
    }
}