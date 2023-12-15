<?php

namespace App\router;

use GuzzleHttp\Psr7\ServerRequest;
use Psr\Http\Message\ResponseInterface;

readonly class RouterDispatcher
{
    public function __construct(
        private ServerRequest $serverRequest,
    ) {
    }

    public function dispatch(array $routes): ResponseInterface
    {
        $route = array_filter($routes, fn (Route $route) =>
            $route->uri === $this->serverRequest->getUri()->getPath()
            && $route->method === $this->serverRequest->getMethod());

        return $this->createResponse($route);
    }

    /**
     * @param Route[] $route
     */
    public function createResponse(array $route): ResponseInterface
    {
        $route = current($route);
        if ($route) {
            $callback = $route->callback;

            return $callback($this->serverRequest, Response::create(), []);
        }

        return PageNotFoundResponse::create();
    }
}
