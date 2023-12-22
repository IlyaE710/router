<?php

namespace App\router;

use GuzzleHttp\Psr7\ServerRequest;

class App
{
    /**
     * @var App
     */
    protected static $instance;
    protected Router $router;

    private function __construct()
    {
    }

    public static function getInstance(): static
    {
        if (self::$instance === null) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    public static function create(): static
    {
        $app = static::getInstance();
        $router = new Router(new RouterDispatcher(ServerRequest::fromGlobals()));
        $app->setRouter($router);
        return $app;
    }

    public function setRouter(Router $router): void
    {
        $this->router = $router;
    }

    public function getRouter(): Router
    {
        return $this->router;
    }

    public function run(): void
    {
        $response = $this->router->dispatch();
        http_response_code($response->getStatusCode());
        echo $response->getBody()->getContents();
    }
}
