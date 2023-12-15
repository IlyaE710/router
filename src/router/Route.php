<?php

namespace App\router;

use Closure;

readonly class Route
{
    public function __construct(
        public string  $method,
        public string  $uri,
        public closure $callback,
    ) {
    }

    public static function create(string $method, string $uri, closure $callback): static
    {
        return new static(
            method: $method,
            uri: $uri,
            callback: $callback,
        );
    }

}
