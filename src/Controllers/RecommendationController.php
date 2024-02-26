<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\RecommendationService;

class RecommendationController extends Controller
{
    private RecommendationService $recommendService;

    public function __construct()
    {
        $this->recommendService = new RecommendationService();
    }

    public function getRecommendations(): void
    {
        $algorithm = $_GET['algorithm'];

        $recommendations = $this->recommendService->getRecommendations($algorithm);

        $this->printResponse(header: $algorithm, titles: $recommendations);
    }
}