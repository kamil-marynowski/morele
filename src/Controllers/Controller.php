<?php

declare(strict_types=1);

namespace App\Controllers;

abstract class Controller
{
    public function printResponse(string $header, array $titles): void
    {
        echo '<h1>' . $header . '</h1><br>';

        foreach ($titles as $title) {
            echo $title . '<br>';
        }
    }
}