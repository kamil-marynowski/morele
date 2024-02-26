<?php

namespace App\Services\RecommendationStrategy;

use App\Helpers\RandomIntGenerator;
use Exception;

class WrongAlgorithmName implements RecommendationInterface
{
    public function filterTitles(array $titles): array
    {
        return ['msg' => 'Wrong algorithm name'];
    }
}