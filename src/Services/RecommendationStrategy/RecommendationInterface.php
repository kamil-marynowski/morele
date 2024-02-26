<?php

namespace App\Services\RecommendationStrategy;

interface RecommendationInterface
{
    public function filterTitles(array $titles): array;
}