<?php

namespace App\router;

use App\router\Response;

class PageNotFoundResponse extends Response
{
    public static function create(): static
    {
        return new static(status: 404);
    }
}
