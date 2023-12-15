<?php

namespace App\router;

class Response extends \GuzzleHttp\Psr7\Response
{
    public static function create(): static
    {
        return new static(status: 200);
    }
}
