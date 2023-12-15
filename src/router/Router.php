<?php

namespace App\router;

use Closure;
use Psr\Http\Message\ResponseInterface;

class Router
{
    public function __construct(
        private readonly RouterDispatcher $dispatcher,
    ) {
    }

    /**
     * @var Route[]
     */
    private array $routes;

    public function get(string $uri, closure $callback): void
    {
        $this->addRoute(HtmlMethod::Get, $uri, $callback);
    }

    public function post(string $uri, closure $callback): void
    {
        $this->addRoute(HtmlMethod::Post, $uri, $callback);
    }

    public function dispatch(): ResponseInterface
    {
        return $this->dispatcher->dispatch($this->routes);
    }

    private function addRoute(HtmlMethod $method, string $uri, closure $callback): void
    {
        $this->routes[] = Route::create($method->value, $uri, $callback);
    }
}
