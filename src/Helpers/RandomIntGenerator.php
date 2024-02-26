<?php

declare(strict_types=1);

namespace App\Helpers;

class RandomIntGenerator
{
    /**
     * Returns provided number of random integers in array
     *
     * @param int $min
     * @param int $max
     * @param int $count
     * @param bool $unique
     * @return array
     * @throws \Exception
     */
    public static function getRandomInt(int $min, int $max, int $count, bool $unique = true): array
    {
        $randomInts = [];

        for ($i = 0; $i < $count; $i++) {
            $random = random_int($min, $max);

            if ($unique && in_array($random, $randomInts)) {
                $i--;
                continue;
            }

            $randomInts[] = $random;
        }

        return $randomInts;
    }
}