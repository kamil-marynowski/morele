<?php

declare(strict_types=1);

namespace Test\Unit;

use App\Services\RecommendationService;
use App\Services\RecommendationStrategy\RecommendationContext;
use PHPUnit\Framework\TestCase;

class RecommendationServiceTest extends TestCase
{
    private RecommendationService $recommendationService;

    private array $titles;

    public function __construct(string $name)
    {
        parent::__construct($name);
        $this->recommendationService = new RecommendationService();
        $this->titles = [
            'Mulan',
            'Szeregowiec Ryan',
            'Shrek',
            'Wojna i Pokój',
            'Owal',
            'Wielki Gatsby',
            'Whiplash',
            'Władca Pierścieni: Dwie wieże',
            'Wielki Gatsby',
        ];
    }

    public function test_more_than_one_word_algorithm()
    {
        $algorithm = 'MoreThanOneWord';

        $recommendation = new RecommendationContext(strategy: $algorithm);

        $result = array_values($recommendation->getRecommendations($this->titles));

        $this->assertSame([
            'Szeregowiec Ryan',
            'Wojna i Pokój',
            'Wielki Gatsby',
            'Władca Pierścieni: Dwie wieże'
        ], $result);
    }

    public function test_three_random_titles_algorithm()
    {
        $algorithm = 'ThreeRandomTitles';

        $recommendation = new RecommendationContext(strategy: $algorithm);

        $result = array_values($recommendation->getRecommendations($this->titles));

        $this->assertSame(3, count($result));
        $this->assertTrue(count($result) === count(array_unique($result)));
    }

    public function test_movies_begin_with_w_and_have_even_number_of_characters_algorithm()
    {
        $algorithm = 'MoviesBeginWithWAndHaveEvenNumberOfCharacters';

        $recommendation = new RecommendationContext(strategy: $algorithm);

        $result = array_values($recommendation->getRecommendations($this->titles));

        foreach ($result as $title) {
            $this->assertTrue(strtolower($title[0]) === 'w');
            $this->assertSame(0, strlen($title) & 2);
        }
    }

    public function test_wrong_name_algorithm()
    {
        $algorithm = 'WrongAlgorithmName';

        $recommendation = new RecommendationContext(strategy: $algorithm);

        $result = array_values($recommendation->getRecommendations($this->titles));

        $this->assertSame(['Wrong algorithm name'], $result);
    }
}